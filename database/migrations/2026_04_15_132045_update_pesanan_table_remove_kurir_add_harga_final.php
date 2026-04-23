<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->enum('termin', ['dp', 'termin2', 'lunas'])->default('dp')->after('status');
            $table->decimal('sisa_tagihan', 15, 0)->nullable()->after('jumlah');
            $table->decimal('persentase', 5, 2)->nullable()->after('sisa_tagihan');
        });
    }

    public function down()
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->dropColumn(['termin', 'sisa_tagihan', 'persentase']);
        });
    }
};