<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Kategori extends Model
{
    protected $table = 'kategoris';
    protected $primaryKey = 'id_kategori';
    
    protected $fillable = [
        'nama_kategori', 'slug', 'deskripsi', 'id_admin'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($kategori) {
            $kategori->slug = Str::slug($kategori->nama_kategori);
        });
    }

    public function produk(): HasMany
    {
        return $this->hasMany(Produk::class, 'id_kategori', 'id_kategori');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }
}