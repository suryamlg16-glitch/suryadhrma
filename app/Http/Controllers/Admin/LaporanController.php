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
        
        // ========== STATISTIK UTAMA ==========
        
        // Pendapatan Bulan Ini
        $pendapatanBulanIni = Pembayaran::where('status', 'sukses')
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->sum('total_harga');
        
        // Pendapatan Tahun Ini
        $pendapatanTahunIni = Pembayaran::where('status', 'sukses')
            ->whereYear('created_at', $tahun)
            ->sum('total_harga');
        
        // Rata-rata per bulan di tahun ini
        $rataRataPerBulan = $pendapatanTahunIni / 12;
        
        // Total Transaksi Tahun Ini
        $totalTransaksi = Pembayaran::whereYear('created_at', $tahun)->count();
        
        // ========== DATA GRAFIK ==========
        
        $dataGrafik = [];
        $namaBulan = [];
        
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $pendapatan = Pembayaran::where('status', 'sukses')
                ->whereYear('created_at', $tahun)
                ->whereMonth('created_at', $bulan)
                ->sum('total_harga');
            
            $dataGrafik[] = $pendapatan;
            $namaBulan[] = Carbon::create()->month($bulan)->translatedFormat('F');
        }
        
        // ========== DATA TABEL BULANAN ==========
        
        $dataBulanan = [];
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $pendapatan = Pembayaran::where('status', 'sukses')
                ->whereYear('created_at', $tahun)
                ->whereMonth('created_at', $bulan)
                ->sum('total_harga');
            
            $jumlahTransaksi = Pembayaran::whereYear('created_at', $tahun)
                ->whereMonth('created_at', $bulan)
                ->count();
            
            $dataBulanan[] = [
                'bulan' => Carbon::create()->month($bulan)->translatedFormat('F'),
                'pendapatan' => $pendapatan,
                'transaksi' => $jumlahTransaksi,
            ];
        }
        
        // ========== TABEL RINCI TRANSAKSI (DENGAN PAGINATION & SEARCH) ==========
        
        $query = Pembayaran::with('pesanan')
            ->whereYear('created_at', $tahun)
            ->orderBy('created_at', 'desc');
        
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
        
        // Menjaga filter tahun dan search saat pagination
        $transaksiList->appends($request->only(['tahun', 'search']));
        
        return view('admin.laporan.index', compact(
            'pendapatanBulanIni', 
            'pendapatanTahunIni', 
            'rataRataPerBulan',
            'totalTransaksi', 
            'dataGrafik', 
            'namaBulan', 
            'dataBulanan', 
            'tahun',
            'transaksiList'  // ✅ TAMBAHKAN INI
        ));
    }
}