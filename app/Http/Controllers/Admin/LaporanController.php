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
        
        // Pendapatan Bulan Ini
        $pendapatanBulanIni = Pembayaran::where('status', 'sukses')
            ->whereYear('tanggal_pembayaran', date('Y'))
            ->whereMonth('tanggal_pembayaran', date('m'))
            ->sum('total_harga');
        
        // Pendapatan Tahun Ini
        $pendapatanTahunIni = Pembayaran::where('status', 'sukses')
            ->whereYear('tanggal_pembayaran', $tahun)
            ->sum('total_harga');
        
        // Rata-rata per bulan
        $rataRataPerBulan = $pendapatanTahunIni / 12;
        
        // Total Transaksi
        $totalTransaksi = Pembayaran::whereYear('tanggal_pembayaran', $tahun)->count();
        
        // Data Grafik
        $dataGrafik = [];
        $namaBulan = [];
        $dataBulanan = [];
        
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $pendapatan = Pembayaran::where('status', 'sukses')
                ->whereYear('tanggal_pembayaran', $tahun)
                ->whereMonth('tanggal_pembayaran', $bulan)
                ->sum('total_harga');
            
            $jumlahTransaksi = Pembayaran::whereYear('tanggal_pembayaran', $tahun)
                ->whereMonth('tanggal_pembayaran', $bulan)
                ->count();
            
            $dataGrafik[] = $pendapatan;
            $namaBulan[] = Carbon::create()->month($bulan)->translatedFormat('F');
            $dataBulanan[] = [
                'bulan' => Carbon::create()->month($bulan)->translatedFormat('F'),
                'pendapatan' => $pendapatan,
                'transaksi' => $jumlahTransaksi,
            ];
        }
        
        // Query untuk transaksi list
        $transaksiList = Pembayaran::with('pesanan')
            ->whereYear('tanggal_pembayaran', $tahun)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('admin.laporan.index', compact(
            'tahun', 'pendapatanBulanIni', 'pendapatanTahunIni', 'rataRataPerBulan',
            'totalTransaksi', 'dataGrafik', 'namaBulan', 'dataBulanan', 'transaksiList'
        ));
    }
}