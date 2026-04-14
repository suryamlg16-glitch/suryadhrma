<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pembayaran::with('pesanan');
        
        // Filter by date range
        if ($request->has('dari_tanggal') && $request->dari_tanggal != '') {
            $query->whereDate('created_at', '>=', $request->dari_tanggal);
        }
        
        if ($request->has('sampai_tanggal') && $request->sampai_tanggal != '') {
            $query->whereDate('created_at', '<=', $request->sampai_tanggal);
        }
        
        // Filter by payment method
        if ($request->has('metode') && $request->metode != '') {
            $query->where('metode_pembayaran', $request->metode);
        }
        
        $transaksi = $query->latest()->paginate(10);
        
        // Statistics - menggunakan 'jumlah'
        $totalPendapatan = Pembayaran::where('status', 'sukses')->sum('jumlah');
        $totalTransaksi = Pembayaran::count();
        $transaksiSukses = Pembayaran::where('status', 'sukses')->count();
        $transaksiPending = Pembayaran::where('status', 'pending')->count();
        $transaksiGagal = Pembayaran::where('status', 'gagal')->count();
        
        // Statistics by payment method - menggunakan 'jumlah'
        $statistikMetode = [
            'cod' => Pembayaran::where('metode_pembayaran', 'cod')->where('status', 'sukses')->sum('jumlah'),
            'transfer' => Pembayaran::where('metode_pembayaran', 'transfer')->where('status', 'sukses')->sum('jumlah'),
            'qris' => Pembayaran::where('metode_pembayaran', 'qris')->where('status', 'sukses')->sum('jumlah'),
        ];
        
        return view('admin.transaksi.index', compact('transaksi', 'totalPendapatan', 'totalTransaksi', 
            'transaksiSukses', 'transaksiPending', 'transaksiGagal', 'statistikMetode'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transaksi = Pembayaran::with('pesanan')->findOrFail($id);
        return view('admin.transaksi.show', compact('transaksi'));
    }
}