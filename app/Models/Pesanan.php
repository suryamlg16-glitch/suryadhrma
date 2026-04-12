<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanans';
    protected $primaryKey = 'id_pesanan';
    
    protected $fillable = [
        'id_user', 'kode_invoice', 'nama_pelanggan', 'no_wa', 'alamat_lengkap',
        'tanggal_pesanan', 'total_harga', 'status_pesanan', 'kurir',
        'metode_pembayaran', 'bukti_pembayaran',
        'tanggal_konfirmasi', 'tanggal_diproses', 'tanggal_dikirim', 'tanggal_selesai'
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
    
    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'id_pesanan', 'id_pesanan');
    }
    
    // ✅ Helper untuk mendapatkan badge status (UPDATE - Lebih Lengkap)
    public function getStatusBadgeAttribute()
    {
        $statuses = [
            'pending' => ['text' => 'Menunggu Konfirmasi', 'color' => 'yellow', 'bg' => 'yellow-100', 'text_color' => 'yellow-800'],
            'diproses' => ['text' => 'Sedang Diproses', 'color' => 'blue', 'bg' => 'blue-100', 'text_color' => 'blue-800'],
            'dikirim' => ['text' => 'Dalam Perjalanan', 'color' => 'purple', 'bg' => 'purple-100', 'text_color' => 'purple-800'],
            'selesai' => ['text' => 'Pesanan Selesai', 'color' => 'green', 'bg' => 'green-100', 'text_color' => 'green-800'],
            'dibatalkan' => ['text' => 'Dibatalkan', 'color' => 'red', 'bg' => 'red-100', 'text_color' => 'red-800'],
        ];
        
        $status = $statuses[$this->status_pesanan] ?? ['text' => 'Unknown', 'color' => 'gray', 'bg' => 'gray-100', 'text_color' => 'gray-800'];
        
        return '<span class="px-2 py-1 text-xs rounded-full bg-' . $status['bg'] . ' text-' . $status['text_color'] . ' font-medium">' . $status['text'] . '</span>';
    }
    
    // ✅ Helper untuk mendapatkan progress persentase (opsional)
    public function getStatusProgressAttribute()
    {
        $progress = [
            'pending' => 20,
            'diproses' => 50,
            'dikirim' => 80,
            'selesai' => 100,
            'dibatalkan' => 0,
        ];
        
        return $progress[$this->status_pesanan] ?? 0;
    }
}