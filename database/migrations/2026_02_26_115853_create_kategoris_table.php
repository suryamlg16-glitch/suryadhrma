<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kategoris', function (Blueprint $table) {
            $table->id('id_kategori');
            $table->string('nama_kategori');
            $table->string('slug')->unique();
            $table->text('deskripsi')->nullable();
            $table->unsignedBigInteger('id_admin');
            $table->timestamps();
            
            $table->foreign('id_admin')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kategoris');
    }
};