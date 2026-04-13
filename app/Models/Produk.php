<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Produk extends Model
{
    protected $table = 'produks';
    
    protected $fillable = [
        'nama_produk', 
        'slug', 
        'deskripsi', 
        'harga', 
        'stok', 
        'gambar_utama', 
        'id_kategori', 
        'id_admin'
    ];

    // Auto generate slug ketika membuat produk
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($produk) {
            if (empty($produk->slug)) {
                $produk->slug = Str::slug($produk->nama_produk);
            }
        });
    }

    // Relasi ke Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    // Relasi ke Admin (User)
    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }

    // Relasi ke Detail Pesanan
    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'id_produk');
    }
}