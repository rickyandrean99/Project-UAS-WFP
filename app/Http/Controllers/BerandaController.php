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
        // $produk = Produk::orderBy('like', 'DESC')->take(5)->get();
        $produk = Produk::take(5)->get();

        return view('user.beranda', compact('kategori', 'brand', 'produk'));
    }
}
