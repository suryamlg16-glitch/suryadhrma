<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of orders.
     */
    public function index()
    {
        $pesanan = Pesanan::with('user')
                         ->latest()
                         ->paginate(10);
        
        // Statistik
        $statistik = [
            'total' => Pesanan::count(),
            'diproses' => Pesanan::where('status_pesanan', 'diproses')->count(),
            'dikirim' => Pesanan::where('status_pesanan', 'dikirim')->count(),
            'selesai' => Pesanan::where('status_pesanan', 'selesai')->count(),
            'dibatalkan' => Pesanan::where('status_pesanan', 'dibatalkan')->count(),
            'pending' => Pesanan::where('status_pesanan', 'pending')->count(),
        ];
        
        return view('admin.pesanan.index', compact('pesanan', 'statistik'));
    }
    
    /**
     * Display the specified order.
     */
    public function show($id)
    {
        $pesanan = Pesanan::with(['user', 'detailPesanan.produk'])
                         ->findOrFail($id);
        
        return view('admin.pesanan.show', compact('pesanan'));
    }
    
    /**
     * Update order status.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,dikirim,selesai,dibatalkan',
        ]);
        
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status_pesanan = $request->status;
        
        // Update timestamp sesuai status
        switch($request->status) {
            case 'diproses':
                if (!$pesanan->tanggal_diproses) {
                    $pesanan->tanggal_diproses = now();
                }
                break;
            case 'dikirim':
                if (!$pesanan->tanggal_dikirim) {
                    $pesanan->tanggal_dikirim = now();
                }
                break;
            case 'selesai':
                if (!$pesanan->tanggal_selesai) {
                    $pesanan->tanggal_selesai = now();
                }
                break;
            case 'dibatalkan':
                if (!$pesanan->tanggal_dibatalkan) {
                    $pesanan->tanggal_dibatalkan = now();
                }
                break;
        }
        
        $pesanan->save();
        
        return redirect()->back()->with('success', 'Status pesanan berhasil diupdate');
    }
}