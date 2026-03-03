<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::with('kategori');
        
        if ($request->has('kategori') && $request->kategori != '') {
            $kategoriFilter = Kategori::where('slug', $request->kategori)->first();
            if ($kategoriFilter) {
                $query->where('id_kategori', $kategoriFilter->id_kategori);
            }
        }
        
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_produk', 'like', '%' . $request->search . '%');
        }
        
        $produk = $query->paginate(9);
        
        // Ambil semua kategori untuk sidebar - pakai nama $kategori
        $kategori = Kategori::all();
        
        return view('user.katalog', compact('produk', 'kategori'));
    }
    
    public function kategori($slug)
    {
        // Ini kategori yang dipilih
        $kategoriTerpilih = Kategori::where('slug', $slug)->firstOrFail();
        
        $produk = Produk::with('kategori')
                       ->where('id_kategori', $kategoriTerpilih->id_kategori)
                       ->paginate(9);
        
        // Ambil semua kategori untuk sidebar
        $kategori = Kategori::all();
        
        return view('user.katalog', compact('produk', 'kategori', 'kategoriTerpilih'));
    }
}