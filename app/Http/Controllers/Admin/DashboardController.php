<?php
namespace App\Http\Controllers\Admin;  // <-- Perhatikan ini harus Admin

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_produk' => Produk::count(),
            'total_pesanan' => Pesanan::count(),
            'total_customer' => User::where('role', 'customer')->count(),
            'total_pendapatan' => Pesanan::where('status_pesanan', 'selesai')
                                        ->sum('total_harga'),
            'total_kategori' => Kategori::count(),
            'pesanan_terbaru' => Pesanan::with('user')
                                       ->latest()
                                       ->limit(5)
                                       ->get(),
            'produk_stok_menipis' => Produk::with('kategori')
                                          ->where('stok', '<', 10)
                                          ->limit(5)
                                          ->get(),
            'produk_terbaru' => Produk::with('kategori')
                                     ->latest()
                                     ->limit(5)
                                     ->get(),
        ];
        
        return view('admin.dashboard', compact('data'));
    }
}