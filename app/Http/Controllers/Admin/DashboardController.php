<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_produk' => Produk::count(),
            'total_pesanan' => Pesanan::count(),
            'total_customer' => User::where('role', 'customer')->count(),
            'total_pendapatan' => Pesanan::where('status_pesanan', 'selesai')->sum('total_harga'),
            'pesanan_terbaru' => Pesanan::with('user')->latest()->limit(5)->get(),
            'produk_stok_menipis' => Produk::where('stok', '<', 10)->limit(5)->get(),
        ];
        
        return view('admin.dashboard', compact('data'));
    }
}