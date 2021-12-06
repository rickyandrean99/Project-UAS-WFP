<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('produk','ProdukController');
Route::resource('brand','BrandController');
Route::resource('kategori','KategoriController');

Route::middleware(['auth'])->group(function(){
    Route::resource('transaksi','TransaksiController');
    Route::resource('voucher','VoucherController');

    Route::middleware('can:cekadmin')->group(function(){
        Route::resource('pegawai','PegawaiController');

        Route::post('/pegawai/suspend/','PegawaiController@suspend')->name('pegawai.suspend');
        Route::post('/pegawai/reset/','PegawaiController@resetPass')->name('pegawai.reset');
    });

    Route::middleware('can:cekpegawai')->group(function(){
        Route::view('/dashboard', 'pegawai.dashboard');

        Route::post('/brand/data',"BrandController@getData")->name('brand.data');
        Route::post('/brand/UpdateData','BrandController@updateData')->name('brand.updateBrand');
        Route::post('/brand/deletes','BrandController@deletData')->name('brand.dltBrand');

        Route::post('/kategori/data',"KategoriController@getData")->name('kategori.data');
        Route::post('/kategori/deletes','KategoriController@deletData')->name('kategori.dltKategori');

        Route::post('/produk/data','ProdukController@getData')->name('produk.data');
        Route::post('/produk/deletes','ProdukController@deletData')->name('produk.dltProduk');
        Route::post('/produk/detail','ProdukController@detail')->name('produk.detail');
    });

    Route::get('/banding', 'ProdukController@bandingProduk');
    Route::get('/wishlist', 'WishlistController@index')->name('wishlist');

    Route::post('/produk/wishlist', 'WishlistController@addOrRemove')->name('produk.wishlist');
    Route::post('/produk/banding/tipe', 'ProdukController@perbandinganTipe')->name('produk.produkberdasarkantipe');
    Route::post('/produk/banding/produk', 'ProdukController@perbandinganProduk')->name('produk.detailberdasarkanproduk');
});  

Route::get('/', 'BerandaController@index')->name('beranda');
Route::get('/produk/kategori/{kategori}', 'KategoriController@tampilkanKategori');
Route::get('/produk/brand/{brand}', 'BrandController@tampilkanBrand');

//route produk custom

// Authentication Routing
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');