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

Route::get('/pinjam','BorrowController@index');
Route::get('/pinjam/form-tambah','BorrowController@create');
Route::post('/pinjam/tambah','BorrowController@store');
Route::get('/pinjam/detail/{slug}','BorrowController@show');
Route::get('/kembali/buku/{id}','BorrowController@update');
Route::get('/kembali','BorrowController@return');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
