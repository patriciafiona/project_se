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
})->name('welcome');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register/daftarDokter', 'daftarDokterController@index')->name('daftarDokter');
Route::post('/register/daftarDokter/new', 'daftarDokterController@store');

Route::get('/register/daftarPasien', 'daftarPasienController@index')->name('daftarPasien');
Route::post('/register/daftarPasien/new', 'daftarPasienController@store');

//Harus Login dulu baru bisa akses 
Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	//Halaman hasil cek lab
	Route::get('/HasilCekLab', 'HasilLabController@index')->name('hasilLab');
	Route::get('/HasilCekLab/new', 'HasilLabController@create');
	Route::post('/HasilCekLab/new', 'HasilLabController@store');

	Route::get('/HasilCekLab/edit/{id}', 'HasilLabController@edit');
	Route::post('/HasilCekLab/edit/{id}', 'HasilLabController@update');

	Route::delete('/HasilCekLab/delete/{id}', 'HasilLabController@destroy');

	//Halaman Catatan Kesehatan
	Route::get('/CatatanKesehatan', 'CatatanKesehatanController@index')->name('catatanKesehatan');

	Route::get('/CatatanKesehatan/mt', 'CatatanKesehatanController@index_mt')->name('catatanKesehatan_mt');
	Route::get('/CatatanKesehatan/gd', 'CatatanKesehatanController@index_gd')->name('catatanKesehatan_gd');
	Route::get('/CatatanKesehatan/td', 'CatatanKesehatanController@index_td')->name('catatanKesehatan_td');
	Route::get('/CatatanKesehatan/k', 'CatatanKesehatanController@index_k')->name('catatanKesehatan_k');

	Route::post('/CatatanKesehatan/new', 'CatatanKesehatanController@store');
	Route::get('/CatatanKesehatan/edit/{id}', 'CatatanKesehatanController@edit');
	Route::post('/CatatanKesehatan/edit/{id}', 'CatatanKesehatanController@update');
	Route::delete('/CatatanKesehatan/delete/{id}', 'CatatanKesehatanController@destroy');

	//Halaman Rekam Medis
	//bagian dokter
	Route::post('/rekamMedis/getPasien', 'RekamMedisController@getPasien');
	Route::get('/rekamMedis/{id}', 'RekamMedisController@index_dokter')->name('rekamMedis');
	Route::get('/rekamMedis/add/{id}', 'RekamMedisController@create');
	Route::post('/rekamMedis/new', 'RekamMedisController@store');
	Route::get('/rekamMedis/edit/{id_pasien}/{id}', 'RekamMedisController@edit');
	Route::post('/rekamMedis/edit/{id}', 'RekamMedisController@update');

	//default user bisa ngapain aja
	Route::get('/rekamMedis/view/{id}', 'RekamMedisController@view');
	Route::get('/rekamMedis', 'RekamMedisController@index')->name('myRecord');

	//Halaman Dokter - sidebar Pasien (daftar dokter yang tambahin dia ke pasien tetap)
	Route::get('/Dokter', 'DokterController@index')->name('dokter');

});

