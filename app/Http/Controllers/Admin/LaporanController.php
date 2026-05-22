<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->tahun ?? date('Y');
        $bulan = $request->bulan; // Filter bulan
        
        // ========== STATISTIK UTAMA ==========
        
        // Pendapatan Bulan Ini (gunakan tanggal_pembayaran)
        $pendapatanBulanIni = Pembayaran::where('status', 'sukses')
            ->whereYear('tanggal_pembayaran', date('Y'))
            ->whereMonth('tanggal_pembayaran', date('m'))
            ->sum('total_harga');
        
        // Pendapatan Tahun Ini (gunakan tanggal_pembayaran)
        $pendapatanTahunIni = Pembayaran::where('status', 'sukses')
            ->whereYear('tanggal_pembayaran', $tahun)
            ->sum('total_harga');
        
        // Rata-rata per bulan di tahun ini
        $rataRataPerBulan = $pendapatanTahunIni / 12;
        
        // Total Transaksi Tahun Ini
        $totalTransaksi = Pembayaran::whereYear('tanggal_pembayaran', $tahun)->count();
        
        // ========== DATA GRAFIK (gunakan tanggal_pembayaran) ==========
        
        $dataGrafik = [];
        $namaBulan = [];
        
        for ($bulanLoop = 1; $bulanLoop <= 12; $bulanLoop++) {
            $pendapatan = Pembayaran::where('status', 'sukses')
                ->whereYear('tanggal_pembayaran', $tahun)
                ->whereMonth('tanggal_pembayaran', $bulanLoop)
                ->sum('total_harga');
            
            $dataGrafik[] = $pendapatan;
            $namaBulan[] = Carbon::create()->month($bulanLoop)->translatedFormat('F');
        }
        
        // ========== DATA TABEL BULANAN ==========
        
        $dataBulanan = [];
        for ($bulanLoop = 1; $bulanLoop <= 12; $bulanLoop++) {
            $pendapatan = Pembayaran::where('status', 'sukses')
                ->whereYear('tanggal_pembayaran', $tahun)
                ->whereMonth('tanggal_pembayaran', $bulanLoop)
                ->sum('total_harga');
            
            $jumlahTransaksi = Pembayaran::whereYear('tanggal_pembayaran', $tahun)
                ->whereMonth('tanggal_pembayaran', $bulanLoop)
                ->count();
            
            $dataBulanan[] = [
                'bulan' => Carbon::create()->month($bulanLoop)->translatedFormat('F'),
                'pendapatan' => $pendapatan,
                'transaksi' => $jumlahTransaksi,
            ];
        }
        
        // ========== TABEL RINCI TRANSAKSI (DENGAN FILTER TAHUN & BULAN) ==========
        
        $query = Pembayaran::with('pesanan')
            ->whereYear('tanggal_pembayaran', $tahun)
            ->orderBy('created_at', 'desc');
        
        // Filter berdasarkan bulan (jika ada)
        if ($bulan && $bulan != '') {
            $query->whereMonth('tanggal_pembayaran', $bulan);
        }
        
        // Search berdasarkan kode transaksi atau nama pelanggan
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('kode_transaksi', 'like', '%' . $search . '%')
                  ->orWhereHas('pesanan', function($sub) use ($search) {
                      $sub->where('nama_pelanggan', 'like', '%' . $search . '%');
                  });
            });
        }
        
        $transaksiList = $query->paginate(10);
        
        // Menjaga filter tahun, bulan, dan search saat pagination
        $transaksiList->appends($request->only(['tahun', 'bulan', 'search']));
        
        return view('admin.laporan.index', compact(
            'pendapatanBulanIni', 
            'pendapatanTahunIni', 
            'rataRataPerBulan',
            'totalTransaksi', 
            'dataGrafik', 
            'namaBulan', 
            'dataBulanan', 
            'tahun',
            'transaksiList'
        ));
    }
}