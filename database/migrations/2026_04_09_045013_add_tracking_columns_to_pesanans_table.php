<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pesanans', function (Blueprint $table) {
            $table->string('kode_invoice')->unique()->after('id_pesanan');
            $table->string('nama_pelanggan')->after('id_user');
            $table->string('no_wa')->after('nama_pelanggan');
            $table->text('alamat_lengkap')->nullable()->after('no_wa');
            $table->string('kurir')->nullable()->after('alamat_lengkap');
            $table->string('metode_pembayaran')->nullable()->after('kurir');
            $table->string('bukti_pembayaran')->nullable()->after('metode_pembayaran');
            $table->timestamp('tanggal_konfirmasi')->nullable()->after('bukti_pembayaran');
            $table->timestamp('tanggal_diproses')->nullable()->after('tanggal_konfirmasi');
            $table->timestamp('tanggal_dikirim')->nullable()->after('tanggal_diproses');
            $table->timestamp('tanggal_selesai')->nullable()->after('tanggal_dikirim');
        });
    }

    public function down()
    {
        Schema::table('pesanans', function (Blueprint $table) {
            $table->dropColumn([
                'kode_invoice', 'nama_pelanggan', 'no_wa', 'alamat_lengkap',
                'kurir', 'metode_pembayaran', 'bukti_pembayaran',
                'tanggal_konfirmasi', 'tanggal_diproses', 'tanggal_dikirim', 'tanggal_selesai'
            ]);
        });
    }
};