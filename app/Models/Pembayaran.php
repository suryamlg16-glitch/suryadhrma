<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayarans';
    protected $primaryKey = 'id_pembayaran';
    
    protected $fillable = [
        'id_pesanan', 'jumlah', 'metode_pembayaran', 'status', 'bukti_pembayaran', 'tanggal_pembayaran'
    ];
    
    protected $casts = [
        'tanggal_pembayaran' => 'date',
    ];
    
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan', 'id_pesanan');
    }
}