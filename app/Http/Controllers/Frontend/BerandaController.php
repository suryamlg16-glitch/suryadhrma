<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        // Hitung total produk
        $totalProduk = Produk::count();
        
        // Ambil 6 produk terbaru
        $produkTerbaru = Produk::with('kategori')
                               ->latest()
                               ->take(6)
                               ->get();
        
        // Ambil semua kategori untuk keperluan navigasi
        $kategori = Kategori::all();
        
        return view('user.beranda', compact('totalProduk', 'produkTerbaru', 'kategori'));
    }
}