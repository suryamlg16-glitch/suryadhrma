<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    /**
     * Tampilkan halaman pemesanan (tahap alamat)
     */
    public function index($slug)
    {
        Log::info('PemesananController@index dipanggil', ['slug' => $slug]);
        
        try {
            $produk = Produk::with('kategori')->where('slug', $slug)->firstOrFail();
            return view('user.pemesanan.alamat', compact('produk'));
        } catch (\Exception $e) {
            Log::error('Produk tidak ditemukan di index', ['slug' => $slug, 'error' => $e->getMessage()]);
            return redirect()->route('katalog')->with('error', 'Produk tidak ditemukan');
        }
    }
    
    /**
     * Simpan data alamat dan lanjut ke tahap pengiriman
     */
    public function storeAlamat(Request $request)
    {
        Log::info('PemesananController@storeAlamat dipanggil', $request->except('_token'));
        
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_wa' => 'required|string|max:20',
            'kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string',
            'catatan' => 'nullable|string',
            'produk_id' => 'required|exists:produks,id',
        ]);
        
        // Simpan data ke session
        session()->put('pemesanan.alamat', $request->except('_token'));
        session()->put('pemesanan.produk_id', $request->produk_id);
        session()->save();
        
        Log::info('Session setelah disimpan', [
            'session_id' => session()->getId(),
            'pemesanan.alamat' => session()->get('pemesanan.alamat'),
            'pemesanan.produk_id' => session()->get('pemesanan.produk_id')
        ]);
        
        return redirect()->route('pesan.pengiriman');
    }
    
    /**
     * Tampilkan halaman pengiriman
     */
    public function pengiriman()
    {
        Log::info('PemesananController@pengiriman dipanggil', [
            'session_id' => session()->getId(),
            'all_session' => session()->all()
        ]);
        
        $alamat = session()->get('pemesanan.alamat');
        $produkId = session()->get('pemesanan.produk_id');
        
        if (!$alamat || !$produkId) {
            Log::warning('Session kosong, redirect ke katalog');
            return redirect()->route('katalog')->with('error', 'Silakan mulai pemesanan dari awal');
        }
        
        $produk = Produk::find($produkId);
        
        if (!$produk) {
            Log::error('Produk tidak ditemukan di pengiriman', ['produkId' => $produkId]);
            return redirect()->route('katalog')->with('error', 'Produk tidak ditemukan');
        }
        
        return view('user.pemesanan.pengiriman', compact('alamat', 'produk'));
    }
    
    /**
     * Simpan data pengiriman dan lanjut ke tahap pembayaran
     */
    public function storePengiriman(Request $request)
    {
        Log::info('storePengiriman() dipanggil', $request->all());
        
        $request->validate([
            'kurir' => 'required|string',
            'biaya_pengiriman' => 'required|numeric',
        ]);
        
        session()->put('pemesanan.pengiriman', [
            'kurir' => $request->kurir,
            'biaya' => $request->biaya_pengiriman,
        ]);
        session()->save();
        
        return redirect()->route('pesan.pembayaran');
    }
    
    /**
     * Tampilkan halaman pembayaran
     */
    public function pembayaran()
    {
        Log::info('pembayaran() dipanggil');
        
        $alamat = session()->get('pemesanan.alamat');
        $produkId = session()->get('pemesanan.produk_id');
        $pengiriman = session()->get('pemesanan.pengiriman');
        
        if (!$alamat || !$produkId || !$pengiriman) {
            Log::warning('Session tidak lengkap, redirect ke katalog');
            return redirect()->route('katalog')->with('error', 'Silakan mulai pemesanan dari awal');
        }
        
        $produk = Produk::find($produkId);
        
        if (!$produk) {
            Log::error('Produk tidak ditemukan di pembayaran', ['produkId' => $produkId]);
            return redirect()->route('katalog')->with('error', 'Produk tidak ditemukan');
        }
        
        $subtotal = $produk->harga;
        $ongkir = $pengiriman['biaya'];
        $total = $subtotal + $ongkir;
        
        return view('user.pemesanan.pembayaran', compact('alamat', 'produk', 'pengiriman', 'subtotal', 'ongkir', 'total'));
    }
    
    /**
     * Simpan data pembayaran ke database - OTOMATIS ISI kode_invoice dan no_wa
     */
    public function storePembayaran(Request $request)
    {
        Log::info('storePembayaran() dipanggil', $request->all());
        
        $request->validate([
            'metode' => 'required|in:qris,transfer',
        ]);
        
        $alamat = session()->get('pemesanan.alamat');
        $produkId = session()->get('pemesanan.produk_id');
        $pengiriman = session()->get('pemesanan.pengiriman');
        $produk = Produk::find($produkId);
        
        if (!$produk) {
            return redirect()->route('katalog')->with('error', 'Produk tidak ditemukan');
        }
        
        $ongkir = $pengiriman['biaya'] ?? 50000;
        $total = $produk->harga + $ongkir;
        
        // Generate kode invoice unik (PASTI TERISI)
        $invoice = 'INV-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6));
        
        // Format alamat lengkap
        $alamatLengkap = $alamat['alamat_lengkap'] . ', ' . $alamat['kecamatan'] . ', ' . $alamat['kota'];
        if (!empty($alamat['catatan'])) {
            $alamatLengkap .= ' (Catatan: ' . $alamat['catatan'] . ')';
        }
        
        // Gunakan DB transaction untuk memastikan semua tersimpan
        DB::beginTransaction();
        
        try {
            // Simpan ke database - PASTIKAN kode_invoice dan no_wa terisi
            $pesanan = Pesanan::create([
                'kode_invoice' => $invoice,
                'id_user' => auth()->id() ?? null,
                'nama_pelanggan' => $alamat['nama_lengkap'],
                'no_wa' => $alamat['no_wa'],
                'alamat_lengkap' => $alamatLengkap,
                'kurir' => $pengiriman['kurir'] == 'jne_reguler' ? 'JNE Reguler' : 'Cargo Furniture',
                'metode_pembayaran' => $request->metode,
                'tanggal_pesanan' => now(),
                'total_harga' => $total,
                'status_pesanan' => 'pending',
            ]);
            
            // Simpan detail pesanan
            DetailPesanan::create([
                'id_pesanan' => $pesanan->id_pesanan,
                'id_produk' => $produk->id,
                'jumlah' => 1,
                'harga_satuan' => $produk->harga,
                'subtotal' => $produk->harga,
            ]);
            
            DB::commit();
            
            Log::info('Pesanan BERHASIL disimpan dengan invoice: ' . $invoice . ' dan no_wa: ' . $alamat['no_wa']);
            
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Gagal menyimpan pesanan: ' . $e->getMessage());
            return redirect()->route('katalog')->with('error', 'Gagal memproses pesanan: ' . $e->getMessage());
        }
        
        // Simpan ke session
        session()->put('pemesanan.invoice', $invoice);
        session()->put('pemesanan.metode_pembayaran', $request->metode);
        session()->put('pemesanan.pesanan_id', $pesanan->id_pesanan);
        session()->save();
        
        return redirect()->route('pesanan.sukses');
    }
    
    /**
     * Tampilkan halaman sukses pesanan
     */
    public function sukses()
    {
        Log::info('sukses() dipanggil');
        
        $alamat = session()->get('pemesanan.alamat');
        $produkId = session()->get('pemesanan.produk_id');
        $pengiriman = session()->get('pemesanan.pengiriman');
        $invoice = session()->get('pemesanan.invoice');
        $metodePembayaran = session()->get('pemesanan.metode_pembayaran');
        $pesananId = session()->get('pemesanan.pesanan_id');
        
        if (!$alamat || !$produkId) {
            return redirect()->route('beranda')->with('error', 'Silakan mulai pemesanan dari awal');
        }
        
        $produk = Produk::find($produkId);
        
        if (!$produk) {
            return redirect()->route('katalog')->with('error', 'Produk tidak ditemukan');
        }
        
        $subtotal = $produk->harga;
        $ongkir = $pengiriman['biaya'] ?? 50000;
        $total = $subtotal + $ongkir;
        $kurir = $pengiriman['kurir'] == 'jne_reguler' ? 'JNE Reguler' : 'Cargo Furniture';
        
        $data = [
            'invoice' => $invoice ?? 'INV-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6)),
            'pesanan_id' => $pesananId,
            'produk' => $produk,
            'alamat' => $alamat,
            'kurir' => $kurir,
            'metode_pembayaran' => $metodePembayaran ?? 'Transfer Bank',
            'subtotal' => $subtotal,
            'ongkir' => $ongkir,
            'total' => $total,
            'tanggal' => date('d F Y'),
        ];
        
        return view('user.pesanan-sukses', $data);
    }
}