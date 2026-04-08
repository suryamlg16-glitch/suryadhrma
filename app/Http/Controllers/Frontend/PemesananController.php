<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        
        // Ambil data dari session
        $alamat = session()->get('pemesanan.alamat');
        $produkId = session()->get('pemesanan.produk_id');
        
        Log::info('Data session di pengiriman', [
            'alamat' => $alamat,
            'produkId' => $produkId
        ]);
        
        // Jika tidak ada data di session, redirect ke katalog
        if (!$alamat || !$produkId) {
            Log::warning('Session kosong, redirect ke katalog');
            return redirect()->route('katalog')->with('error', 'Silakan mulai pemesanan dari awal');
        }
        
        // Ambil data produk
        $produk = Produk::find($produkId);
        
        // Jika produk tidak ditemukan
        if (!$produk) {
            Log::error('Produk tidak ditemukan di pengiriman', ['produkId' => $produkId]);
            return redirect()->route('katalog')->with('error', 'Produk tidak ditemukan');
        }
        
        Log::info('Menampilkan halaman pengiriman');
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
        
        // Simpan data pengiriman ke session
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
        
        // Ambil data dari session
        $alamat = session()->get('pemesanan.alamat');
        $produkId = session()->get('pemesanan.produk_id');
        $pengiriman = session()->get('pemesanan.pengiriman');
        
        // Jika tidak ada data di session, redirect ke katalog
        if (!$alamat || !$produkId || !$pengiriman) {
            Log::warning('Session tidak lengkap, redirect ke katalog', [
                'alamat' => $alamat,
                'produkId' => $produkId,
                'pengiriman' => $pengiriman
            ]);
            return redirect()->route('katalog')->with('error', 'Silakan mulai pemesanan dari awal');
        }
        
        // Ambil data produk
        $produk = Produk::find($produkId);
        
        // Jika produk tidak ditemukan
        if (!$produk) {
            Log::error('Produk tidak ditemukan di pembayaran', ['produkId' => $produkId]);
            return redirect()->route('katalog')->with('error', 'Produk tidak ditemukan');
        }
        
        // Hitung total
        $subtotal = $produk->harga;
        $ongkir = $pengiriman['biaya'];
        $total = $subtotal + $ongkir;
        
        Log::info('Menampilkan halaman pembayaran', [
            'subtotal' => $subtotal,
            'ongkir' => $ongkir,
            'total' => $total
        ]);
        
        return view('user.pemesanan.pembayaran', compact('alamat', 'produk', 'pengiriman', 'subtotal', 'ongkir', 'total'));
    }
}