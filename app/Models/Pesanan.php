<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanans';
    protected $primaryKey = 'id_pesanan';
    
    protected $fillable = [
        'kode_invoice',
        'invoice', 
        'id_user', 
        'nama_pelanggan', 
        'no_wa',
        'email_pelanggan', 
        'no_hp',
        'alamat', 
        'alamat_lengkap',
        'kota', 
        'kecamatan',
        'kode_pos', 
        'metode_pengiriman', 
        'biaya_pengiriman',
        'metode_pembayaran', 
        'status_pembayaran', 
        'status_pesanan',
        'subtotal', 
        'total_harga', 
        'harga_final',
        'status_deal',
        'catatan', 
        'tanggal_pesanan',
        'tanggal_transfer',
        'tanggal_konfirmasi',
        'tanggal_diproses',
        'tanggal_dikirim',
        'tanggal_selesai',
    ];
    
    protected $casts = [
        'tanggal_pesanan' => 'date',
        'tanggal_konfirmasi' => 'datetime',
        'tanggal_diproses' => 'datetime',
        'tanggal_dikirim' => 'datetime',
        'tanggal_selesai' => 'datetime',
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
    
    // Helper untuk badge status
    public function getStatusBadgeAttribute()
    {
        $badges = [
            'pending' => '<span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs">Pending</span>',
            'dikonfirmasi' => '<span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Dikonfirmasi</span>',
            'diproses' => '<span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs">Diproses</span>',
            'dikirim' => '<span class="bg-purple-100 text-purple-800 px-2 py-1 rounded-full text-xs">Dikirim</span>',
            'selesai' => '<span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Selesai</span>',
            'dibatalkan' => '<span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs">Dibatalkan</span>',
        ];
        
        return $badges[$this->status_pesanan] ?? '<span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs">' . ucfirst($this->status_pesanan) . '</span>';
    }
    
    // Helper untuk badge status deal
    public function getStatusDealBadgeAttribute()
    {
        $badges = [
            'menunggu' => '<span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">Menunggu Deal</span>',
            'deal' => '<span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Sudah Deal</span>',
            'batal' => '<span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs">Batal</span>',
        ];
        
        return $badges[$this->status_deal] ?? '<span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs">' . ucfirst($this->status_deal) . '</span>';
    }
}