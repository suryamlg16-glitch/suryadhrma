<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanans';
    protected $primaryKey = 'id_pesanan';
    
    protected $fillable = [
        'invoice', 'id_user', 'nama_pelanggan', 'email_pelanggan', 'no_hp',
        'alamat', 'kota', 'kode_pos', 'metode_pengiriman', 'biaya_pengiriman',
        'metode_pembayaran', 'status_pembayaran', 'status_pesanan',
        'subtotal', 'total_harga', 'catatan', 'tanggal_pesanan'
    ];
    
    protected $casts = [
        'tanggal_pesanan' => 'date',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_pesanan', 'id_pesanan');
    }
    
    public function details()
    {
        return $this->hasMany(DetailPesanan::class, 'id_pesanan', 'id_pesanan');
    }
}