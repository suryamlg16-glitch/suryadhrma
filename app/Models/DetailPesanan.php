<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    protected $table = 'detail_pesanans';
    protected $primaryKey = 'id_detail';
    
    protected $fillable = [
        'id_pesanan', 'id_produk', 'jumlah', 'harga_satuan', 'subtotal'
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan', 'id_pesanan');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}