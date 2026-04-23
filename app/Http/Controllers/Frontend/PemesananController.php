<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
     * Simpan data alamat dan langsung simpan pesanan (LANGSUNG SELESAI)
     */
    public function storeAlamat(Request $request)
    {
        try {
            Log::info('storeAlamat MULAI');
            
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
            
            Log::info('Validasi BERHASIL');
            
            $produk = Produk::find($request->produk_id);
            
            // Generate kode invoice unik
            $invoice = 'INV-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6));
            
            // Format alamat lengkap
            $alamatLengkap = $request->alamat_lengkap . ', ' . $request->kecamatan . ', ' . $request->kota;
            if (!empty($request->catatan)) {
                $alamatLengkap .= ' (Catatan: ' . $request->catatan . ')';
            }
            
            Log::info('Data siap disimpan');
            
            DB::beginTransaction();
            
            try {
                // Simpan ke database
                $pesanan = Pesanan::create([
                    'kode_invoice' => $invoice,
                    'id_user' => auth()->id() ?? null,
                    'nama_pelanggan' => $request->nama_lengkap,
                    'no_wa' => $request->no_wa,
                    'alamat_lengkap' => $alamatLengkap,
                    'tanggal_pesanan' => now(),
                    'total_harga' => $produk->harga,
                    'status_pesanan' => 'pending',
                    'status_deal' => 'menunggu',
                ]);
                
                Log::info('Pesanan tersimpan, ID: ' . $pesanan->id_pesanan);
                
                // Simpan detail pesanan
                DetailPesanan::create([
                    'id_pesanan' => $pesanan->id_pesanan,
                    'id_produk' => $produk->id,
                    'jumlah' => 1,
                    'harga_satuan' => $produk->harga,
                    'subtotal' => $produk->harga,
                ]);
                
                Log::info('Detail pesanan tersimpan');
                
                // HAPUS KODE PEMBUATAN TRANSAKSI OTOMATIS DI SINI
                
                DB::commit();
                
                // Simpan ke session untuk halaman sukses
                session()->put('pemesanan.invoice', $invoice);
                session()->put('pemesanan.produk_id', $produk->id);
                session()->put('pemesanan.alamat', $request->all());
                session()->put('pemesanan.pesanan_id', $pesanan->id_pesanan);
                session()->save();
                
                return redirect()->route('pesanan.sukses');
                
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            
        } catch (\Exception $e) {
            Log::error('ERROR: ' . $e->getMessage());
            return redirect()->route('katalog')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    
    /**
     * Tampilkan halaman sukses pesanan
     */
    public function sukses()
    {
        Log::info('sukses() dipanggil');
        
        $invoice = session()->get('pemesanan.invoice');
        $produkId = session()->get('pemesanan.produk_id');
        $alamat = session()->get('pemesanan.alamat');
        $pesananId = session()->get('pemesanan.pesanan_id');
        
        if (!$invoice || !$produkId || !$alamat) {
            return redirect()->route('beranda')->with('error', 'Silakan mulai pemesanan dari awal');
        }
        
        $produk = Produk::find($produkId);
        
        if (!$produk) {
            return redirect()->route('katalog')->with('error', 'Produk tidak ditemukan');
        }
        
        // Ambil data pembayaran (DP)
        $pembayaran = Pembayaran::where('id_pesanan', $pesananId)->first();
        
        $data = [
            'invoice' => $invoice,
            'produk' => $produk,
            'alamat' => $alamat,
            'subtotal' => $produk->harga,
            'dp' => $pembayaran ? $pembayaran->jumlah : ($produk->harga * 0.3),
            'sisa_tagihan' => $pembayaran ? $pembayaran->sisa_tagihan : ($produk->harga * 0.7),
            'persentase' => 30,
            'ongkir' => 0,
            'total' => $produk->harga,
            'kurir' => 'Pengiriman oleh Toko',
            'metode_pembayaran' => 'DP 30% - Sisa lunas sebelum pengiriman',
        ];
        
        return view('user.pesanan-sukses', $data);
    }
}