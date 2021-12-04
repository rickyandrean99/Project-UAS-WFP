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
Route::middleware(['auth'])->group(function(){
    Route::resource('pegawai','PegawaiController');
    Route::resource('brand','BrandController');
    Route::view('/dashboard', 'pegawai.dashboard');
});

Route::get('/', 'BerandaController@index')->name('beranda');
Route::get('/produk/kategori/{kategori}', 'KategoriController@tampilkanKategori');
Route::get('/produk/brand/{brand}', 'BrandController@tampilkanBrand');
Route::get('/banding', 'ProdukController@bandingProduk');

Route::post('/pegawai/suspend/','PegawaiController@suspend')->name('pegawai.suspend');
Route::post('/pegawai/reset/','PegawaiController@resetPass')->name('pegawai.reset');
Route::post('/brand/data',"BrandController@getData")->name('brand.data');
Route::post('/brand/UpdateData','BrandController@updateData')->name('brand.updateBrand');
Route::post('/brand/deletes','BrandController@deletData')->name('brand.dltBrand');



// Authentication Routing
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');