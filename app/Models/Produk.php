<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Produk extends Model
{
    protected $table = 'produks';
    
    protected $fillable = [
        'nama_produk', 'slug', 'deskripsi', 'deskripsi_singkat', 
        'harga', 'harga_min', 'harga_max', 'stok', 'unggulan',
        'gambar_utama', 'id_kategori', 'id_admin'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($produk) {
            $produk->slug = Str::slug($produk->nama_produk);
        });
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }

    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'id_produk');
    }
}