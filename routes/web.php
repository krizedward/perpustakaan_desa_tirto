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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
