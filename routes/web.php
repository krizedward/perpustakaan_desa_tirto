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

//Halaman tampilan depan
Route::get('/', function() {
	return view('home');
})->name('home.guest');
//Halaman tampilan list buku untuk guest 
Route::get('/list/buku', 'MemberController@list')->name('book.guest');

//middleware grup
Route::group(['middleware'=>'auth'],function() {
	//tampilan home setelah login
	Route::get('/home', function() {
		return redirect('/dashboard');
	})->name('home');
	//tampilan dashboard
	Route::get('/dashboard','HomeController@admin')->name('home.admin');
	//halaman anggota
	Route::get('/anggota','MemberController@index')->name('member.index');
	Route::get('/anggota/form-tambah','MemberController@create')->name('member.create');
	Route::post('/anggota/tambah','MemberController@store')->name('member.store');
	Route::get('/anggota/detail/{slug}','MemberController@show')->name('member.show');
	Route::get('/anggota/form-edit/{slug}','MemberController@edit')->name('member.edit');
	Route::put('/anggota/update/{id}','MemberController@update')->name('member.update');
	Route::get('/anggota/hapus/{id}','MemberController@destroy')->name('member.destroy');
	//halaman kategori
	Route::get('/kategori','CategoryController@index');
	Route::get('/kategori/form-tambah','CategoryController@create');
	Route::post('/kategori/tambah','CategoryController@store');
	Route::get('/kategori/form-edit/{slug}','CategoryController@edit');
	Route::put('/kategori/update/{id}','CategoryController@update');
	Route::get('/kategori/hapus/{id}','CategoryController@destroy');
	//halaman buku
	Route::get('/buku','BookController@index')->name('book.create');
	Route::get('/buku/list/{id}','BookController@detail')->name('book.detail');
	Route::get('/buku/form-tambah','BookController@create')->name('book.create');
	Route::post('/buku/tambah','BookController@store')->name('book.store');
	Route::get('/buku/detail/{slug}','BookController@show')->name('book.show');
	Route::get('/buku/form-edit/{slug}','BookController@edit')->name('book.edit');
	Route::put('/buku/update/{id}','BookController@update')->name('book.update');
	Route::get('/buku/hapus/{id}','BookController@destroy')->name('book.destroy');
	Route::get('/buku/pasif/{id}','BookController@passive')->name('book.passive');
	Route::get('/buku/aktif/{id}','BookController@activation')->name('book.activation');
	//halaman pinjam
	Route::get('/pinjam','BorrowController@index')->name('borrow.index');
	Route::get('/pinjam/form-tambah','BorrowController@create');
	Route::post('/pinjam/tambah','BorrowController@store');
	Route::post('/pinjam/pending','BorrowController@pending');
	Route::get('/pinjam/detail/{slug}','BorrowController@show');
	Route::get('/kembali/buku/{id}','BorrowController@update');
	//halaman kembali
	Route::get('/kembali','BorrowController@return')->name('borrow.retrun');
	Route::get('/pinjam/setuju/{id}','BorrowController@agree')->name('borrow.agree');
	Route::get('/pinjam/tolak/{id}','BorrowController@reject')->name('borrow.reject');

});

Auth::routes();
Route::get('keluar',function(){
    \Auth::logout();
    return redirect('login');
});
