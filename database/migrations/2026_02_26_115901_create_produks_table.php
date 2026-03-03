<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('slug')->unique();
            $table->text('deskripsi');
            $table->decimal('harga', 10, 2);
            $table->integer('stok');
            $table->string('gambar')->nullable();
            $table->unsignedBigInteger('id_kategori');
            $table->unsignedBigInteger('id_admin');
            $table->timestamps();
            
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris');
            $table->foreign('id_admin')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};