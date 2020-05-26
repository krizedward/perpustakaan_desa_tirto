<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kategori','CategoryController@index');
Route::get('/kategori/form-tambah','CategoryController@create');
Route::post('/kategori/tambah','CategoryController@store');
Route::get('/kategori/form-edit/{slug}','CategoryController@edit');
Route::put('/kategori/update/{id}','CategoryController@update');
Route::get('/kategori/hapus/{id}','CategoryController@destroy');

Route::get('/buku','BookController@index');
Route::get('/buku/form-tambah','BookController@create');
Route::post('/buku/tambah','BookController@store');
Route::get('/buku/detail/{slug}','BookController@show');
Route::get('/buku/form-edit/{slug}','BookController@edit');
Route::put('/buku/update/{id}','BookController@update');
Route::get('/buku/hapus/{id}','BookController@destroy');

Route::get('/pinjam','BookController@index');
Route::get('/pinjam/form-tambah','BookController@create');
Route::post('/pinjam/tambah','BookController@store');
Route::get('/pinjam/detail/{slug}','BookController@show');
Route::get('/pinjam/form-edit/{slug}','BookController@edit');
Route::put('/pinjam/update/{id}','BookController@update');
Route::get('/pinjam/hapus/{id}','BookController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
