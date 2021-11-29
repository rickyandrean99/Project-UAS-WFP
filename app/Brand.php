<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function produks() {
        return $this->hasMany('App\Produk', 'brands_id', 'id');
    }
}
