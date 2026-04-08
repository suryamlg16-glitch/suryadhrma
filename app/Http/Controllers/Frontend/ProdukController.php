<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display the specified product for frontend.
     */
    public function show($slug)
    {
        // Ambil produk berdasarkan slug
        $produk = Produk::with('kategori')
                       ->where('slug', $slug)
                       ->firstOrFail();
        
        // Ambil produk terkait (kategori sama, exclude produk ini)
        $produkTerkait = Produk::with('kategori')
                              ->where('id_kategori', $produk->id_kategori)
                              ->where('id', '!=', $produk->id)
                              ->take(4)
                              ->get();
        
        return view('user.detail-produk', compact('produk', 'produkTerkait'));
    }
}