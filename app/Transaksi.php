<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public function user() {
        return $this->belongsTo('App\User', 'users_id');
    }

    public function produks() {
        return $this->belongsToMany('App\Produk', 'transaksi_produk', 'transaksis_id', 'produks_id')->withPivot('kuantitas', 'harga');
    }
}
