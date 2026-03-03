<?php
namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            [
                'nama_kategori' => 'Kursi',
                'deskripsi' => 'Koleksi kursi kayu berkualitas',
                'id_admin' => 1,
            ],
            [
                'nama_kategori' => 'Meja',
                'deskripsi' => 'Meja kayu solid berbagai ukuran',
                'id_admin' => 1,
            ],
            [
                'nama_kategori' => 'Lemari',
                'deskripsi' => 'Lemari pakaian dan pajangan',
                'id_admin' => 1,
            ],
            [
                'nama_kategori' => 'Tempat Tidur',
                'deskripsi' => 'Ranjang kayu berkualitas',
                'id_admin' => 1,
            ],
            [
                'nama_kategori' => 'Rak',
                'deskripsi' => 'Rak buku dan rak serbaguna',
                'id_admin' => 1,
            ],
        ];

        foreach ($kategori as $kat) {
            Kategori::create($kat);
        }
    }
}