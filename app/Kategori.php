<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    // protected $table = 'kategoris';
    // public $timestamps = false;
    public function produks() {
        return $this->hasMany('App\Produk', 'kategoris_id', 'id');
    }
}
