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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/admin', 'dashboardController@index');
Route::get('/product', 'ProductController@index');
Route::get('/create-product', 'ProductController@create');
Route::post('/product/store', 'ProductController@store');
Route::get('/edit/{id}', 'ProductController@edit');
Route::PUT('/product/update/{id}', 'ProductController@update');
Route::delete('/delete/{id}', 'ProductController@destroy');
Route::get('/product/photo', 'GaleriController@index');
Route::get('/product/add-photo', 'GaleriController@create');
Route::post('/photo/store', 'GaleriController@store');
Route::DELETE('/photo/delete/{id}', 'GaleriController@destroy');
Route::get('/product/{id}/galery', 'ProductController@galeri');

// Transaksi::resource();
Route::get('/transaksi', 'TransaksiController@index');
Route::get('/transaksi/show/{id}', 'TransaksiController@show');
Route::get('/transaksi/edit/{id}', 'TransaksiController@edit');
Route::PUT('/transaksi/update/{uuid}', 'TransaksiController@update');
Route::DELETE('/transaksi/delete/{id}', 'TransaksiController@destroy');


















