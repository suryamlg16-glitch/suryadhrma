<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pesanan::with('user');
        
        // Search by customer name
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_pelanggan', 'like', '%' . $request->search . '%');
        }
        
        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status_pesanan', $request->status);
        } else {
            // DEFAULT: Sembunyikan pesanan yang sudah selesai
            $query->where('status_pesanan', '!=', 'selesai');
        }
        
        // Filter by date
        if ($request->has('date') && $request->date != '') {
            $query->whereDate('tanggal_pesanan', $request->date);
        }
        
        $pesanan = $query->latest()->paginate(10);
        
        // Statistics
        $statistik = [
            'total' => Pesanan::count(),
            'pending' => Pesanan::where('status_pesanan', 'pending')->count(),
            'dikonfirmasi' => Pesanan::where('status_pesanan', 'dikonfirmasi')->count(),
            'diproses' => Pesanan::where('status_pesanan', 'diproses')->count(),
            'dikirim' => Pesanan::where('status_pesanan', 'dikirim')->count(),
            'selesai' => Pesanan::where('status_pesanan', 'selesai')->count(),
            'dibatalkan' => Pesanan::where('status_pesanan', 'dibatalkan')->count(),
        ];
        
        return view('admin.pesanan.index', compact('pesanan', 'statistik'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pesanan = Pesanan::with(['user', 'details.produk'])->findOrFail($id);
        return view('admin.pesanan.show', compact('pesanan'));
    }

    /**
     * Update the status of the specified resource.
     */
    public function updateStatus(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:pending,dikonfirmasi,diproses,dikirim,selesai,dibatalkan'
        ]);
        
        $pesanan->status_pesanan = $request->status;
        
        // Set tanggal sesuai status
        if ($request->status == 'dikonfirmasi' && !$pesanan->tanggal_konfirmasi) {
            $pesanan->tanggal_konfirmasi = now();
        }
        if ($request->status == 'diproses' && !$pesanan->tanggal_diproses) {
            $pesanan->tanggal_diproses = now();
        }
        if ($request->status == 'dikirim' && !$pesanan->tanggal_dikirim) {
            $pesanan->tanggal_dikirim = now();
        }
        if ($request->status == 'selesai' && !$pesanan->tanggal_selesai) {
            $pesanan->tanggal_selesai = now();
        }
        
        $pesanan->save();
        
        return redirect()->route('admin.pesanan.index')
            ->with('success', 'Status pesanan berhasil diupdate!');
    }
}