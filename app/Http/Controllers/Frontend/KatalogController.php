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
        
        // Filter berdasarkan kategori
        if ($request->has('kategori') && $request->kategori != '') {
            $kategoriFilter = Kategori::where('slug', $request->kategori)->first();
            if ($kategoriFilter) {
                $query->where('id_kategori', $kategoriFilter->id_kategori);
            }
        }
        
        // Filter berdasarkan pencarian
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_produk', 'like', '%' . $request->search . '%');
        }
        
        // Sorting
        if ($request->has('sort') && $request->sort != '') {
            switch($request->sort) {
                case 'termurah':
                    $query->orderBy('harga', 'asc');
                    break;
                case 'termahal':
                    $query->orderBy('harga', 'desc');
                    break;
                case 'terbaru':
                default:
                    $query->latest();
                    break;
            }
        } else {
            $query->latest();
        }
        
        // Pagination: 9 produk per halaman
        $produk = $query->paginate(9);
        
        // Ambil semua kategori untuk filter (jika diperlukan)
        $kategori = Kategori::all();
        
        return view('user.katalog', compact('produk', 'kategori'));
    }
    
    public function kategori($slug)
    {
        $kategori = Kategori::where('slug', $slug)->firstOrFail();
        
        $produk = Produk::with('kategori')
                       ->where('id_kategori', $kategori->id_kategori)
                       ->paginate(9);
        
        $semuaKategori = Kategori::all();
        
        return view('user.katalog', compact('produk', 'semuaKategori', 'kategori'));
    }
}