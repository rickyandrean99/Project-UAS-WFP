<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Brand;
use App\Produk;

class BerandaController extends Controller
{
    function index() {
        $kategori = Kategori::all();
        $brand = Brand::all();

        // urutkan 5 produk dengan wishlist terbanyak
        $produk = Produk::all();
        $arr_index = [];
        foreach($produk as $p) array_push($arr_index, count($p->users));
        arsort($arr_index);
        $index_list = array_slice(array_keys($arr_index), 0, 5, true);
        $produks = [];
        foreach($index_list as $index => $value) {
            $produk = Produk::find($value+=1);
            array_push($produks, $produk);
        }

        return view('user.beranda', compact('kategori', 'brand', 'produks'));
    }
}
