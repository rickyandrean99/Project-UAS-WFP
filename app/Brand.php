<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Brand extends Model
{
    use softDeletes;
    public function produks() {
        return $this->hasMany('App\Produk', 'brands_id', 'id');
    }
}
