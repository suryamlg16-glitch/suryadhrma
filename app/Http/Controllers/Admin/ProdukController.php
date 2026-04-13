<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index(Request $request)
{
    $query = Produk::with('kategori');
    
    // Search
    if ($request->has('search') && $request->search != '') {
        $query->where('nama_produk', 'like', '%' . $request->search . '%');
    }
    
    // Filter kategori
    if ($request->has('kategori') && $request->kategori != '') {
        $query->where('id_kategori', $request->kategori);
    }
    
    // Sorting
    $sort = $request->get('sort', 'terbaru');
    if ($sort == 'termurah') {
        $query->orderBy('harga', 'asc');
    } elseif ($sort == 'termahal') {
        $query->orderBy('harga', 'desc');
    } else {
        $query->latest();
    }
    
    $produk = $query->paginate(10);
    $kategoris = Kategori::all();
    
    // Hitung statistik
    $totalProduk = Produk::count();
    $stokMenipis = Produk::where('stok', '<=', 5)->where('stok', '>', 0)->count();
    $stokAman = Produk::where('stok', '>', 5)->count();
    $totalKategori = Kategori::count();
    
    return view('admin.produk.index', compact('produk', 'kategoris', 'totalProduk', 'stokMenipis', 'stokAman', 'totalKategori'));
}

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.produk.create', compact('kategori'));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id_kategori',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'nama_produk' => $request->nama_produk,
            'id_kategori' => $request->kategori_id,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'id_admin' => auth()->id(),
        ];
        
        // Buat slug
        $slug = Str::slug($request->nama_produk);
        $slugExists = Produk::where('slug', $slug)->exists();
        $data['slug'] = $slugExists ? $slug . '-' . time() : $slug;

        // Upload gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/produk'), $filename);
            $data['gambar_utama'] = 'produk/' . $filename;
        }

        Produk::create($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified product.
     */
    public function show($id)
    {
        $produk = Produk::with('kategori')->findOrFail($id);
        return view('admin.produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.produk.edit', compact('produk', 'kategori'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id_kategori',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'nama_produk' => $request->nama_produk,
            'id_kategori' => $request->kategori_id,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
        ];

        // Update slug jika nama berubah
        if ($produk->nama_produk != $request->nama_produk) {
            $slug = Str::slug($request->nama_produk);
            $slugExists = Produk::where('slug', $slug)->where('id', '!=', $id)->exists();
            $data['slug'] = $slugExists ? $slug . '-' . time() : $slug;
        }

        // Upload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($produk->gambar_utama && file_exists(public_path('images/' . $produk->gambar_utama))) {
                unlink(public_path('images/' . $produk->gambar_utama));
            }
            
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/produk'), $filename);
            $data['gambar_utama'] = 'produk/' . $filename;
        }

        $produk->update($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diupdate');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        
        // Hapus gambar
        if ($produk->gambar_utama && file_exists(public_path('images/' . $produk->gambar_utama))) {
            unlink(public_path('images/' . $produk->gambar_utama));
        }
        
        $produk->delete();
        
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus');
    }
}