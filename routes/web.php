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

Route::get('/', 'BerandaController@index')->name('beranda');
Route::get('/produk/kategori/{kategori}', 'KategoriController@tampilkanKategori');
Route::get('/produk/brand/{brand}', 'BrandController@tampilkanBrand');

Route::resource('produk','ProdukController');
Route::resource('brand','BrandController');
Route::resource('kategori','KategoriController');

Route::middleware(['auth'])->group(function(){
    // Route khusus administrator
    Route::middleware('can:cekadmin')->group(function(){
        Route::resource('pegawai','PegawaiController');

        Route::post('/pegawai/suspend/','PegawaiController@suspend')->name('pegawai.suspend');
        Route::post('/pegawai/reset/','PegawaiController@resetPass')->name('pegawai.reset');
    });

    // Route khusus pegawai dan administrator
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
        Route::post('/transaksi/confirm','TransaksiController@confirm')->name('transaksi.confirm');
        Route::post('/transaksi/details','TransaksiController@detail')->name('transaksi.details');
        Route::post('/voucher/data','VoucherController@getData')->name('voucher.data');
        Route::post('/voucher/deletes','VoucherController@dltVoucher')->name('voucher.dltVoucher');
    });

    // Route khusus akun yang sudah login
    Route::resource('transaksi','TransaksiController');
    Route::resource('voucher','VoucherController');

    Route::get('/banding', 'ProdukController@bandingProduk');

    Route::get('/wishlist', 'WishlistController@index')->name('wishlist');
    Route::post('/produk/wishlist', 'WishlistController@addOrRemove')->name('produk.wishlist');
    Route::post('/produk/banding/tipe', 'ProdukController@perbandinganTipe')->name('produk.produkberdasarkantipe');
    Route::post('/produk/banding/produk', 'ProdukController@perbandinganProduk')->name('produk.detailberdasarkanproduk');

    Route::get('/keranjang', 'ProdukController@keranjang')->name("keranjang");
    Route::post('/keranjang/tambahhapus', 'ProdukController@tambahHapusKeranjang')->name("keranjang.tambahhapus");
    Route::post('/keranjang/ubah', 'ProdukController@ubahKeranjang')->name("keranjang.ubah");

    Route::get('/checkout', 'TransaksiController@loadCheckout');
    Route::post('/checkout/produk', 'TransaksiController@checkoutProduk')->name('checkout.produk');

    Route::post('/voucher/check', 'VoucherController@checkVoucher')->name('voucher.check');
});

// Authentication Routing
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');