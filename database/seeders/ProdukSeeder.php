<?php
namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $produk = [
            [
                'nama_produk' => 'Kursi Tamu Jati',
                'slug' => 'kursi-tamu-jati',
                'deskripsi' => 'Kursi tamu minimalis dari kayu jati berkualitas tinggi. Cocok untuk ruang tamu modern.',
                'deskripsi_singkat' => 'Kursi tamu jati kualitas ekspor',
                'harga' => 1500000,
                'harga_min' => 1500000,      // <-- TAMBAHKAN INI
                'harga_max' => 2500000,       // <-- TAMBAHKAN INI
                'stok' => 10,
                'unggulan' => true,
                'id_kategori' => 1,
                'id_admin' => 1,
            ],
            [
                'nama_produk' => 'Meja Makan Marmer',
                'slug' => 'meja-makan-marmer',
                'deskripsi' => 'Meja makan dengan permukaan marmer asli, rangka kayu jati pilihan.',
                'deskripsi_singkat' => 'Meja makan mewah dengan marmer',
                'harga' => 3500000,
                'harga_min' => 3500000,      // <-- TAMBAHKAN INI
                'harga_max' => 5000000,       // <-- TAMBAHKAN INI
                'stok' => 5,
                'unggulan' => true,
                'id_kategori' => 2,
                'id_admin' => 1,
            ],
            [
                'nama_produk' => 'Lemari Pakaian 3 Pintu',
                'slug' => 'lemari-pakaian-3-pintu',
                'deskripsi' => 'Lemari pakaian dengan cermin besar, 3 pintu, finishing cat duco halus.',
                'deskripsi_singkat' => 'Lemari pakaian dengan cermin',
                'harga' => 4500000,
                'harga_min' => 4500000,      // <-- TAMBAHKAN INI
                'harga_max' => 6500000,       // <-- TAMBAHKAN INI
                'stok' => 3,
                'unggulan' => false,
                'id_kategori' => 3,
                'id_admin' => 1,
            ],
            [
                'nama_produk' => 'Rak Buku Minimalis',
                'slug' => 'rak-buku-minimalis',
                'deskripsi' => 'Rak buku 5 tingkat dengan desain minimalis, cocok untuk ruang baca.',
                'deskripsi_singkat' => 'Rak buku 5 tingkat',
                'harga' => 1200000,
                'harga_min' => 1200000,      // <-- TAMBAHKAN INI
                'harga_max' => 1800000,       // <-- TAMBAHKAN INI
                'stok' => 8,
                'unggulan' => false,
                'id_kategori' => 5,
                'id_admin' => 1,
            ],
            [
                'nama_produk' => 'Kursi Santai Rotan',
                'slug' => 'kursi-santai-rotan',
                'deskripsi' => 'Kursi santai dari rotan sintetis, nyaman untuk bersantai di teras.',
                'deskripsi_singkat' => 'Kursi santai rotan',
                'harga' => 850000,
                'harga_min' => 850000,       // <-- TAMBAHKAN INI
                'harga_max' => 1200000,       // <-- TAMBAHKAN INI
                'stok' => 15,
                'unggulan' => true,
                'id_kategori' => 1,
                'id_admin' => 1,
            ],
        ];

        foreach ($produk as $p) {
            Produk::create($p);
        }

        $this->command->info('Produk berhasil ditambahkan!');
    }
}