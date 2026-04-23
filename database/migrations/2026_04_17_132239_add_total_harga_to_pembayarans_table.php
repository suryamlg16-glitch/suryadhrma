<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            if (!Schema::hasColumn('pembayarans', 'total_harga')) {
                $table->decimal('total_harga', 15, 0)->nullable()->after('jumlah');
            }
            if (!Schema::hasColumn('pembayarans', 'jumlah_dibayar')) {
                $table->decimal('jumlah_dibayar', 15, 0)->default(0)->after('total_harga');
            }
        });
    }

    public function down()
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->dropColumn(['total_harga', 'jumlah_dibayar']);
        });
    }
};