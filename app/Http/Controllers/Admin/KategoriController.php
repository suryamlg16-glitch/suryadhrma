<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // withCount('produk') akan menambahkan atribut produk_count
        $kategoris = Kategori::withCount('produk')->latest()->paginate(10);
        
        $totalKategori = Kategori::count();
        $totalProduk = \App\Models\Produk::count();
        $rataProduk = $totalKategori > 0 ? round($totalProduk / $totalKategori, 1) : 0;
        
        return view('admin.kategori.index', compact('kategoris', 'totalKategori', 'totalProduk', 'rataProduk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoris,nama_kategori',
            'deskripsi' => 'nullable|string',
        ]);

        $slug = Str::slug($request->nama_kategori);
        
        // Cek slug unik
        $slugExists = Kategori::where('slug', $slug)->exists();
        if ($slugExists) {
            $slug = $slug . '-' . time();
        }

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => $slug,
            'deskripsi' => $request->deskripsi,
            'id_admin' => auth()->id(),
        ]);

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kategori = Kategori::with('produk')->findOrFail($id);
        return view('admin.kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoris,nama_kategori,' . $id . ',id_kategori',
            'deskripsi' => 'nullable|string',
        ]);

        // Update slug jika nama berubah
        if ($kategori->nama_kategori != $request->nama_kategori) {
            $slug = Str::slug($request->nama_kategori);
            $slugExists = Kategori::where('slug', $slug)->where('id_kategori', '!=', $id)->exists();
            if ($slugExists) {
                $slug = $slug . '-' . time();
            }
            $kategori->slug = $slug;
        }

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->deskripsi = $request->deskripsi;
        $kategori->save();

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        
        // Cek apakah kategori memiliki produk
        if ($kategori->produk()->count() > 0) {
            return redirect()->route('admin.kategori.index')
                ->with('error', 'Kategori tidak bisa dihapus karena masih memiliki ' . $kategori->produk()->count() . ' produk!');
        }
        
        $kategori->delete();

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil dihapus!');
    }
}