<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Cek apakah kolom gambar ada, jika ada rename
        if (Schema::hasColumn('produks', 'gambar')) {
            Schema::table('produks', function (Blueprint $table) {
                $table->renameColumn('gambar', 'gambar_utama');
            });
        }
        
        // Tambah kolom lain jika belum ada
        if (!Schema::hasColumn('produks', 'deskripsi_singkat')) {
            Schema::table('produks', function (Blueprint $table) {
                $table->text('deskripsi_singkat')->nullable()->after('deskripsi');
            });
        }
        
        if (!Schema::hasColumn('produks', 'harga_min')) {
            Schema::table('produks', function (Blueprint $table) {
                $table->decimal('harga_min', 12, 2)->nullable()->after('harga');
            });
        }
        
        if (!Schema::hasColumn('produks', 'harga_max')) {
            Schema::table('produks', function (Blueprint $table) {
                $table->decimal('harga_max', 12, 2)->nullable()->after('harga_min');
            });
        }
        
        if (!Schema::hasColumn('produks', 'unggulan')) {
            Schema::table('produks', function (Blueprint $table) {
                $table->boolean('unggulan')->default(false)->after('stok');
            });
        }
    }

    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            if (Schema::hasColumn('produks', 'gambar_utama')) {
                $table->renameColumn('gambar_utama', 'gambar');
            }
            
            $table->dropColumn([
                'deskripsi_singkat',
                'harga_min',
                'harga_max',
                'unggulan'
            ]);
        });
    }
};