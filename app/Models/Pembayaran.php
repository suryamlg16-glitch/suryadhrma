<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayarans';
    protected $primaryKey = 'id_pembayaran';
    
    protected $fillable = [
        'id_pesanan', 'kode_transaksi', 'metode_pembayaran', 'jumlah_dibayar',
        'status', 'bukti_pembayaran', 'tanggal_pembayaran', 'catatan'
    ];
    
    protected $casts = [
        'tanggal_pembayaran' => 'datetime',
    ];
    
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan', 'id_pesanan');
    }
}