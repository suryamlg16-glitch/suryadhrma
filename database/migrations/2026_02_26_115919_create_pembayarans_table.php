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
            $table->decimal('jumlah', 10, 2);
            $table->enum('metode_pembayaran', ['transfer', 'cash', 'kartu_kredit']);
            $table->enum('status', ['pending', 'sukses', 'gagal'])->default('pending');
            $table->string('bukti_pembayaran')->nullable();
            $table->date('tanggal_pembayaran');
            $table->timestamps();
            
            $table->foreign('id_pesanan')->references('id_pesanan')->on('pesanans');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};