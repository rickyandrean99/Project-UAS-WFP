<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Kategori extends Model
{
    // protected $table = 'kategoris';
    // public $timestamps = false;
    use softDeletes;
    public function produks() {
        return $this->hasMany('App\Produk', 'kategoris_id', 'id');
    }
}
