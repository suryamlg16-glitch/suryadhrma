<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = ['Kursi', 'Meja', 'Lemari', 'Rak', 'Sofa', 'Tempat Tidur'];
        
        foreach ($kategoris as $nama) {
            Kategori::create([
                'nama_kategori' => $nama,
                'slug' => Str::slug($nama),
                'deskripsi' => 'Kategori ' . $nama,
                'id_admin' => 1,
            ]);
        }
    }
}