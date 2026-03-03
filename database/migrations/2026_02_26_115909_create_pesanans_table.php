<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id('id_pesanan');
            $table->unsignedBigInteger('id_user');
            $table->date('tanggal_pesanan');
            $table->decimal('total_harga', 10, 2);
            $table->enum('status_pesanan', ['pending', 'diproses', 'dikirim', 'selesai', 'dibatalkan'])
                  ->default('pending');
            $table->timestamps();
            
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};