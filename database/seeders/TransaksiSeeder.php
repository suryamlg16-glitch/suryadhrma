<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use Carbon\Carbon;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        $pesanan = Pesanan::first();
        
        if ($pesanan) {
            Pembayaran::create([
                'id_pesanan' => $pesanan->id_pesanan,
                'kode_transaksi' => 'TRX-' . date('Ymd') . '-0001',
                'metode_pembayaran' => 'transfer',
                'jumlah_dibayar' => $pesanan->total_harga,
                'status' => 'sukses',
                'tanggal_pembayaran' => Carbon::now(),
            ]);
        }
    }
}