<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            if (!Schema::hasColumn('pembayarans', 'bukti_dp')) {
                $table->string('bukti_dp')->nullable()->after('bukti_pembayaran');
            }
            if (!Schema::hasColumn('pembayarans', 'bukti_termin2')) {
                $table->string('bukti_termin2')->nullable()->after('bukti_dp');
            }
            if (!Schema::hasColumn('pembayarans', 'bukti_pelunasan')) {
                $table->string('bukti_pelunasan')->nullable()->after('bukti_termin2');
            }
        });
    }

    public function down()
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->dropColumn(['bukti_dp', 'bukti_termin2', 'bukti_pelunasan']);
        });
    }
};