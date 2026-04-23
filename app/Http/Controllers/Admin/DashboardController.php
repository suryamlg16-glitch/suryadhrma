<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // ========== TOTAL CUSTOMER (HANYA YANG SUDAH DEAL) ==========
        // Customer yang pesanannya sudah deal (bukan pending atau batal)
        $statusDeal = ['dikonfirmasi', 'diproses', 'dikirim', 'selesai'];
        
        $totalCustomerFromPesanan = Pesanan::whereNotNull('nama_pelanggan')
            ->whereIn('status_pesanan', $statusDeal)
            ->distinct('nama_pelanggan')
            ->count('nama_pelanggan');
        
        // Total Customer dari tabel users (role customer)
        $totalCustomerFromUsers = User::where('role', 'customer')->count();
        
        // Gabungkan keduanya
        $totalCustomer = max($totalCustomerFromPesanan, $totalCustomerFromUsers);
        
        // ========== TOTAL PENDAPATAN ==========
        // Dari tabel pembayaran yang statusnya sukses
        $totalPendapatan = Pembayaran::where('status', 'sukses')->sum('total_harga');
        
        // ========== TOTAL PESANAN SELESAI ==========
        $totalPesananSelesai = Pesanan::where('status_pesanan', 'selesai')->count();
        
        // ========== RATA-RATA PROYEK ==========
        $rataRataProyek = 0;
        if ($totalPesananSelesai > 0 && $totalPendapatan > 0) {
            $rataRataProyek = $totalPendapatan / $totalPesananSelesai;
        }
        
        // ========== DATA UNTUK VIEW ==========
        $data = [
            // Baris pertama - 4 card
            'menunggu_survey' => Pesanan::where('status_pesanan', 'pending')->count(),
            'deal_negosiasi' => Pesanan::where('status_pesanan', 'dikonfirmasi')->count(),
            'dalam_produksi' => Pesanan::where('status_pesanan', 'diproses')->count(),
            'total_pendapatan' => $totalPendapatan,
            
            // Baris kedua - 3 card
            'total_pesanan' => Pesanan::count(),
            'total_customer' => $totalCustomer,
            'rata_rata_proyek' => $rataRataProyek,
            
            // Lainnya
            'butuh_survey' => Pesanan::where('status_pesanan', 'pending')->count(),
            'pesanan_terbaru' => Pesanan::with('user')->latest()->limit(5)->get(),
        ];
        
        return view('admin.dashboard', compact('data'));
    }
}