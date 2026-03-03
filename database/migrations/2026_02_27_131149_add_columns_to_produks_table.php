<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            // Tambah kolom untuk rentang harga
            $table->decimal('harga_min', 10, 2)->after('harga');
            $table->decimal('harga_max', 10, 2)->after('harga_min');
            
            // Tambah deskripsi singkat untuk card produk
            $table->string('deskripsi_singkat')->nullable()->after('deskripsi');
            
            // Tambah flag untuk produk unggulan
            $table->boolean('unggulan')->default(false)->after('stok');
            
            // Opsional: rename kolom gambar jadi gambar_utama biar lebih jelas
            $table->renameColumn('gambar', 'gambar_utama');
        });
    }

    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->dropColumn(['harga_min', 'harga_max', 'deskripsi_singkat', 'unggulan']);
            $table->renameColumn('gambar_utama', 'gambar');
        });
    }
};