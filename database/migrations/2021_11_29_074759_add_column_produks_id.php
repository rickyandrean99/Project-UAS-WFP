<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnProduksId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_wishlist', function (Blueprint $table) {
            $table->unsignedBigInteger('produks_id');
            $table->foreign('produks_id')->references('id')->on('produks');
        });

        Schema::table('transaksi_produk', function (Blueprint $table) {
            $table->unsignedBigInteger('produks_id');
            $table->foreign('produks_id')->references('id')->on('produks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_wishlist', function (Blueprint $table) {
            $table->dropForeign(['produks_id']);
            $table->dropColumn('produks_id');
        });

        Schema::table('transaksi_produk', function (Blueprint $table) {
            $table->dropForeign(['produks_id']);
            $table->dropColumn('produks_id');
        });
    }
}
