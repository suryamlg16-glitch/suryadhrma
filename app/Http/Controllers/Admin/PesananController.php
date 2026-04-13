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
            'status' => 'required|in:pending,diproses,dikirim,selesai,dibatalkan'
        ]);
        
        $pesanan->status_pesanan = $request->status;
        $pesanan->save();
        
        return redirect()->route('admin.pesanan.index')
            ->with('success', 'Status pesanan berhasil diupdate!');
    }
}