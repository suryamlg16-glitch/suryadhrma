<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index(Request $request)
    {
        $query = Produk::query();
        
        // Search
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_produk', 'like', '%' . $request->search . '%');
        }
        
        // Sorting (default: terlama di atas / baru di bawah)
        $sort = $request->get('sort', 'terlama');
        if ($sort == 'terbaru') {
            $query->orderBy('id', 'desc');
        } elseif ($sort == 'termurah') {
            $query->orderBy('harga', 'asc');
        } elseif ($sort == 'termahal') {
            $query->orderBy('harga', 'desc');
        } else {
            $query->orderBy('id', 'asc'); // terlama di atas
        }
        
        $produk = $query->paginate(10);
        
        // Hitung statistik
        $totalProduk = Produk::count();
        $totalPesanan = \App\Models\Pesanan::count();
        
        return view('admin.produk.index', compact('produk', 'totalProduk', 'totalPesanan'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('admin.produk.create');
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Bulatkan harga (fix floating point issue)
        $harga = round($request->harga);

        // Buat slug
        $slug = Str::slug($request->nama_produk);
        $slugExists = Produk::where('slug', $slug)->exists();
        $slug = $slugExists ? $slug . '-' . time() : $slug;

        // Buat deskripsi singkat (ambil 100 karakter pertama)
        $deskripsiSingkat = Str::limit($request->deskripsi, 100);

        // Upload gambar
        $gambarUtama = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $gambarUtama = $filename;
        }

        // Simpan produk
        Produk::create([
            'nama_produk' => $request->nama_produk,
            'slug' => $slug,
            'deskripsi' => $request->deskripsi,
            'deskripsi_singkat' => $deskripsiSingkat,
            'harga' => $harga,
            'harga_min' => $harga,
            'harga_max' => $harga,
            'stok' => 0,
            'unggulan' => 0,
            'gambar_utama' => $gambarUtama,
            'id_kategori' => 1,
            'id_admin' => auth()->id(),
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified product.
     */ 
    public function show($id)
        {
            $produk = Produk::findOrFail($id);
            return view('admin.produk.show', compact('produk'));
        }

    /**
     * Show the form for editing the specified product.
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.edit', compact('produk'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Bulatkan harga
        $harga = round($request->harga);

        // Update slug jika nama berubah
        $slug = $produk->slug;
        if ($produk->nama_produk != $request->nama_produk) {
            $slug = Str::slug($request->nama_produk);
            $slugExists = Produk::where('slug', $slug)->where('id', '!=', $id)->exists();
            $slug = $slugExists ? $slug . '-' . time() : $slug;
        }

        // Update deskripsi singkat
        $deskripsiSingkat = Str::limit($request->deskripsi, 100);

        // Upload gambar baru
        $gambarUtama = $produk->gambar_utama;
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($produk->gambar_utama && file_exists(public_path('images/' . $produk->gambar_utama))) {
                unlink(public_path('images/' . $produk->gambar_utama));
            }
            
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $gambarUtama = $filename;
        }

        // Update produk
        $produk->update([
            'nama_produk' => $request->nama_produk,
            'slug' => $slug,
            'deskripsi' => $request->deskripsi,
            'deskripsi_singkat' => $deskripsiSingkat,
            'harga' => $harga,
            'harga_min' => $harga,
            'harga_max' => $harga,
            'gambar_utama' => $gambarUtama,
        ]);

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