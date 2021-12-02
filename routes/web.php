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


// Resource Routing
Route::resource('produk','ProdukController');
Route::resource('pegawai','PegawaiController');

// Custom Routing
Route::get('/', 'BerandaController@index')->name('beranda');
Route::get('/produk/kategori/{kategori}', 'ProdukController@tampilkanKategori');
Route::get('/produk/brand/{brand}', 'ProdukController@tampilkanBrand');

// Authentication Routing
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
