<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of transactions.
     */
    public function index(Request $request)
    {
        $query = Pesanan::with(['user', 'pembayaran'])
                       ->where('status_pesanan', 'selesai');
        
        // Filter berdasarkan tanggal
        if ($request->filled('start_date')) {
            $query->whereDate('tanggal_pesanan', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('tanggal_pesanan', '<=', $request->end_date);
        }
        
        // Filter berdasarkan metode pembayaran
        if ($request->filled('metode')) {
            $query->whereHas('pembayaran', function($q) use ($request) {
                $q->where('metode_pembayaran', $request->metode);
            });
        }
        
        $transaksi = $query->latest()
                          ->paginate(10)
                          ->appends($request->all());
        
        // Statistik
        $statistik = [
            'total_pendapatan' => Pesanan::where('status_pesanan', 'selesai')->sum('total_harga'),
            'total_transaksi' => Pesanan::where('status_pesanan', 'selesai')->count(),
            'total_cod' => Pembayaran::where('metode_pembayaran', 'cod')
                                     ->whereHas('pesanan', function($q) {
                                         $q->where('status_pesanan', 'selesai');
                                     })->count(),
            'total_qris' => Pembayaran::where('metode_pembayaran', 'qris')
                                      ->whereHas('pesanan', function($q) {
                                          $q->where('status_pesanan', 'selesai');
                                      })->count(),
            'total_transfer' => Pembayaran::where('metode_pembayaran', 'transfer')
                                          ->whereHas('pesanan', function($q) {
                                              $q->where('status_pesanan', 'selesai');
                                          })->count(),
        ];
        
        return view('admin.transaksi.index', compact('transaksi', 'statistik'));
    }
    
    /**
     * Display the specified transaction.
     */
    public function show($id)
    {
        $transaksi = Pesanan::with(['user', 'detailPesanan.produk', 'pembayaran'])
                           ->where('status_pesanan', 'selesai')
                           ->findOrFail($id);
        
        return view('admin.transaksi.show', compact('transaksi'));
    }
    
    /**
     * Update transaction status (if needed).
     */
    public function updateStatus(Request $request, $id)
    {
        // Optional: untuk update status pembayaran jika diperlukan
        $request->validate([
            'status_pembayaran' => 'required|in:sukses,gagal,pending',
        ]);
        
        $pembayaran = Pembayaran::where('id_pesanan', $id)->firstOrFail();
        $pembayaran->update(['status' => $request->status_pembayaran]);
        
        return redirect()->back()->with('success', 'Status pembayaran berhasil diupdate');
    }
}