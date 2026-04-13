<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->unsignedBigInteger('id_pesanan');
            $table->string('kode_transaksi')->unique();
            $table->enum('metode_pembayaran', ['cod', 'transfer', 'qris'])->default('cod');
            $table->decimal('jumlah_dibayar', 12, 2);
            $table->enum('status', ['pending', 'sukses', 'gagal'])->default('pending');
            $table->string('bukti_pembayaran')->nullable();
            $table->dateTime('tanggal_pembayaran')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
            
            $table->foreign('id_pesanan')->references('id_pesanan')->on('pesanans')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};