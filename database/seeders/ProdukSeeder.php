<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Str;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil ID kategori
        $kursiId = Kategori::where('nama_kategori', 'Kursi')->first()->id_kategori ?? 1;
        $mejaId = Kategori::where('nama_kategori', 'Meja')->first()->id_kategori ?? 2;
        $lemariId = Kategori::where('nama_kategori', 'Lemari')->first()->id_kategori ?? 3;
        $rakId = Kategori::where('nama_kategori', 'Rak')->first()->id_kategori ?? 4;
        $sofaId = Kategori::where('nama_kategori', 'Sofa')->first()->id_kategori ?? 5;
        $tempatTidurId = Kategori::where('nama_kategori', 'Tempat Tidur')->first()->id_kategori ?? 6;

        $produk = [
            [
                'nama_produk' => 'Kursi Tamu Jati',
                'slug' => 'kursi-tamu-jati',
                'deskripsi' => 'Kursi tamu dari kayu jati berkualitas tinggi',
                'harga' => 1500000,
                'stok' => 10,
                'gambar_utama' => null,
                'id_kategori' => $kursiId,
                'id_admin' => 1,
            ],
            [
                'nama_produk' => 'Meja Makan Marmer',
                'slug' => 'meja-makan-marmer',
                'deskripsi' => 'Meja makan dengan permukaan marmer elegan',
                'harga' => 3500000,
                'stok' => 5,
                'gambar_utama' => null,
                'id_kategori' => $mejaId,
                'id_admin' => 1,
            ],
            [
                'nama_produk' => 'Lemari Pakaian 3 Pintu',
                'slug' => 'lemari-pakaian-3-pintu',
                'deskripsi' => 'Lemari pakaian dengan 3 pintu dan cermin',
                'harga' => 4500000,
                'stok' => 3,
                'gambar_utama' => null,
                'id_kategori' => $lemariId,
                'id_admin' => 1,
            ],
            [
                'nama_produk' => 'Rak Buku Minimalis',
                'slug' => 'rak-buku-minimalis',
                'deskripsi' => 'Rak buku desain minimalis untuk ruang belajar',
                'harga' => 1200000,
                'stok' => 8,
                'gambar_utama' => null,
                'id_kategori' => $rakId,
                'id_admin' => 1,
            ],
            [
                'nama_produk' => 'Kursi Santai Rotan',
                'slug' => 'kursi-santai-rotan',
                'deskripsi' => 'Kursi santai dari rotan alami',
                'harga' => 850000,
                'stok' => 15,
                'gambar_utama' => null,
                'id_kategori' => $kursiId,
                'id_admin' => 1,
            ],
            [
                'nama_produk' => 'Sofa L Shape Mewah',
                'slug' => 'sofa-l-shape-mewah',
                'deskripsi' => 'Sofa mewah berbentuk L dengan bahan kulit',
                'harga' => 5500000,
                'stok' => 4,
                'gambar_utama' => null,
                'id_kategori' => $sofaId,
                'id_admin' => 1,
            ],
            [
                'nama_produk' => 'Springbed Queen Size',
                'slug' => 'springbed-queen-size',
                'deskripsi' => 'Springbed ukuran queen dengan kualitas premium',
                'harga' => 2800000,
                'stok' => 7,
                'gambar_utama' => null,
                'id_kategori' => $tempatTidurId,
                'id_admin' => 1,
            ],
        ];

        foreach ($produk as $p) {
            Produk::create($p);
        }

        $this->command->info('Produk berhasil ditambahkan!');
    }
}