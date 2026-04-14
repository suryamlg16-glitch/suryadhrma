<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    /**
     * Tampilkan halaman form tracking
     */
    public function index()
    {
        return view('user.tracking');
    }
    
    /**
     * Cek pesanan berdasarkan invoice dan no WhatsApp
     */
    public function cek(Request $request)
    {
        $request->validate([
            'invoice' => 'required|string',
            'no_wa' => 'required|string',
        ]);
        
        $pesanan = Pesanan::where('kode_invoice', $request->invoice)
                          ->where('no_wa', $request->no_wa)
                          ->first();
        
        if (!$pesanan) {
            return back()->with('error', 'Pesanan tidak ditemukan. Periksa kembali nomor invoice dan WhatsApp.');
        }
        
        return redirect()->route('tracking.show', $pesanan->kode_invoice);
    }
    
    /**
     * Tampilkan detail tracking pesanan
     */
    public function show($invoice)
    {
        // PERBAIKAN: ganti detailPesanan menjadi details
        $pesanan = Pesanan::with('details.produk')
                          ->where('kode_invoice', $invoice)
                          ->firstOrFail();
        
        // Timeline status pesanan
        $timeline = [
            [
                'status' => 'pending', 
                'label' => 'Pesanan Dibuat', 
                'icon' => '📝', 
                'time' => $pesanan->tanggal_pesanan,
                'description' => 'Pesanan telah diterima sistem'
            ],
            [
                'status' => 'dikonfirmasi', 
                'label' => 'Dikonfirmasi Admin', 
                'icon' => '✅', 
                'time' => $pesanan->tanggal_konfirmasi,
                'description' => 'Pesanan telah dikonfirmasi oleh admin'
            ],
            [
                'status' => 'diproses', 
                'label' => 'Sedang Diproses', 
                'icon' => '🔧', 
                'time' => $pesanan->tanggal_diproses,
                'description' => 'Pesanan sedang dalam proses produksi'
            ],
            [
                'status' => 'dikirim', 
                'label' => 'Dalam Perjalanan', 
                'icon' => '🚚', 
                'time' => $pesanan->tanggal_dikirim,
                'description' => 'Pesanan dalam perjalanan menuju alamat Anda'
            ],
            [
                'status' => 'selesai', 
                'label' => 'Pesanan Selesai', 
                'icon' => '🏠', 
                'time' => $pesanan->tanggal_selesai,
                'description' => 'Pesanan telah sampai dan selesai'
            ],
        ];
        
        return view('user.tracking-show', compact('pesanan', 'timeline'));
    }
}