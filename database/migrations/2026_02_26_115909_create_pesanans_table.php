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
            $table->string('invoice')->unique();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('nama_pelanggan');
            $table->string('email_pelanggan')->nullable();
            $table->string('no_hp');
            $table->text('alamat');
            $table->string('kota');
            $table->string('kode_pos')->nullable();
            $table->enum('metode_pengiriman', ['jne', 'tiki', 'pos'])->default('jne');
            $table->decimal('biaya_pengiriman', 12, 2)->default(0);
            $table->enum('metode_pembayaran', ['cod', 'transfer', 'qris'])->default('cod');
            $table->enum('status_pembayaran', ['pending', 'paid', 'failed'])->default('pending');
            $table->enum('status_pesanan', ['pending', 'diproses', 'dikirim', 'selesai', 'dibatalkan'])->default('pending');
            $table->decimal('subtotal', 12, 2);
            $table->decimal('total_harga', 12, 2);
            $table->text('catatan')->nullable();
            $table->date('tanggal_pesanan');
            $table->timestamps();
            
            $table->foreign('id_user')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};