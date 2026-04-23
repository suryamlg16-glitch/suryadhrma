<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayarans';
    protected $primaryKey = 'id_pembayaran';
    
    protected $fillable = [
    'id_pesanan',
    'kode_transaksi',
    'total_harga',
    'jumlah_dibayar',
    'sisa_tagihan',
    'persentase',
    'metode_pembayaran',
    'status',
    'termin',
    'bukti_dp',
    'bukti_termin2',
    'bukti_pelunasan',
    'tanggal_pembayaran',
    ];
    
    protected $casts = [
        'tanggal_pembayaran' => 'datetime',
    ];
    
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan', 'id_pesanan');
    }
    
    public function getStatusBadgeAttribute()
    {
        $badges = [
            'pending' => '<span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">Menunggu</span>',
            'sukses' => '<span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Lunas</span>',
            'gagal' => '<span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs">Gagal</span>',
        ];
        return $badges[$this->status] ?? '<span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs">' . ucfirst($this->status) . '</span>';
    }
    
    public function getTerminBadgeAttribute()
    {
        $badges = [
            'dp' => '<span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs">💰 DP 30%</span>',
            'termin2' => '<span class="bg-purple-100 text-purple-800 px-2 py-1 rounded-full text-xs">🔧 Termin 30%</span>',
            'lunas' => '<span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">✅ Pelunasan 40%</span>',
        ];
        return $badges[$this->termin] ?? '<span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs">' . ucfirst($this->termin) . '</span>';
    }
}