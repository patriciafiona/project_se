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

Route::get('/HasilCekLab', 'HasilLabController@index')->name('hasilLab');
Route::get('/HasilCekLab/new', 'HasilLabController@create');
Route::post('/HasilCekLab/new', 'HasilLabController@store');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

});

