<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public function kategori() {
        return $this->belongsTo('App\Kategori', 'kategoris_id');
    }

    public function brand() {
        return $this->belongsTo('App\Brand', 'brands_id');
    }
}
