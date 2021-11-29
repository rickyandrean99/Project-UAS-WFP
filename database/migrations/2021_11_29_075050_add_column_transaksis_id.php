<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTransaksisId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi_produk', function (Blueprint $table) {
            $table->unsignedBigInteger('transaksis_id');
            $table->foreign('transaksis_id')->references('id')->on('transaksis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi_produk', function (Blueprint $table) {
            $table->dropForeign(['transaksis_id']);
            $table->dropColumn('transaksis_id');
        });
    }
}
