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

Route::post('/register/daftarPasien/foto', 'daftarPasienController@temporary_photo');

//Harus Login dulu baru bisa akses 
Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::delete('/profile/delete/{id}', ['as' => 'profile.destroy', 'uses' => 'ProfileController@destroy']);
	Route::get('/profile/profilePicture', 'ProfileController@editProfile');
	Route::post('/profile/crop', 'ProfileController@crop');


	//Proses hasil select 2
	Route::get('/search/idPasien', function(){
		return App\User::where([['email','LIKE','%'.request('q').'%'],['id','!=', auth()->user()->id]])->paginate(10);
	});

	Route::get('/search/idDokter', function(){
		return App\User::where([['email','LIKE','%'.request('q').'%'],['jenis_user','2'],['id','!=', auth()->user()->id]])->paginate(10);
	});


	//Halaman hasil cek lab
	Route::get('/HasilCekLab', 'HasilLabController@index')->name('hasilLab');
	Route::get('/HasilCekLab/new', 'HasilLabController@create');
	Route::post('/HasilCekLab/new', 'HasilLabController@store');

	Route::get('/HasilCekLab/edit/{id}', 'HasilLabController@edit');
	Route::post('/HasilCekLab/edit/{id}', 'HasilLabController@update');

	Route::delete('/HasilCekLab/delete/{id}', 'HasilLabController@destroy');

	Route::get('/pemeriksaanPasien/HasilCekLab/view/{id}', 'HasilLabController@view');	




	//Halaman Catatan Kesehatan
	Route::get('/CatatanKesehatan', 'CatatanKesehatanController@index')->name('catatanKesehatan');

	Route::get('/CatatanKesehatan/mt', 'CatatanKesehatanController@index_mt')->name('catatanKesehatan_mt');
	Route::get('/CatatanKesehatan/gd', 'CatatanKesehatanController@index_gd')->name('catatanKesehatan_gd');
	Route::get('/CatatanKesehatan/td', 'CatatanKesehatanController@index_td')->name('catatanKesehatan_td');
	Route::get('/CatatanKesehatan/k', 'CatatanKesehatanController@index_k')->name('catatanKesehatan_k');

	Route::post('/CatatanKesehatan/new', 'CatatanKesehatanController@store');
	Route::get('/CatatanKesehatan/edit/{id}', 'CatatanKesehatanController@edit');
	Route::get('/CatatanKesehatan/edit_td/{id}', 'CatatanKesehatanController@edit_td');
	Route::post('/CatatanKesehatan/edit/{id}', 'CatatanKesehatanController@update');
	Route::delete('/CatatanKesehatan/delete/{id}', 'CatatanKesehatanController@destroy');




	//Halaman Rekam Medis
	//bagian dokter
	Route::get('/pemeriksaanPasien/rekamMedis/{id}', 'RekamMedisController@index_dokter')->name('rekamMedis');
	Route::get('/pemeriksaanPasien/rekamMedis/add/{id}', 'RekamMedisController@create');
	Route::post('/pemeriksaanPasien/rekamMedis/new', 'RekamMedisController@store');
	Route::get('/pemeriksaanPasien/rekamMedis/edit/{id_pasien}/{id}', 'RekamMedisController@edit');
	Route::post('/pemeriksaanPasien/rekamMedis/edit/{id}', 'RekamMedisController@update');


	//default user bisa ngapain aja (pasien, dokter)
	Route::get('/rekamMedis/view/{id}', 'RekamMedisController@view');
	Route::get('/rekamMedis', 'RekamMedisController@index')->name('myRecord');




	//Halaman Dokter - sidebar Pasien (daftar dokter yang tambahin dia ke pasien tetap)
	Route::get('/Dokter', 'DokterController@index')->name('dokter');
	Route::get('/Dokter/biodata/{id}', 'DokterController@biodata');
	Route::get('/Dokter/remove/{id}', 'DokterController@validation');
	Route::post('/Dokter/remove/{id}', 'DokterController@destroy');




	//Halaman Pasien tetap - sidebar Dokter (daftar Pasien yang tambahin dia ke pasien tetap)
	Route::get('/PasienTetap', 'PasienTetapController@index')->name('pasienTetap');
	Route::get('/PasienTetap/add/{id}', 'PasienTetapController@create');
	Route::post('/PasienTetap/add/{id}', 'PasienTetapController@store');
	Route::get('/PasienTetap/remove/{id}', 'PasienTetapController@validation');
	Route::post('/PasienTetap/remove/{id}', 'PasienTetapController@destroy');




	//Halaman Biodata pasien
	Route::get('/pasien/biodata/{id}', 'BiodataController@index')->name('biodata');



	//Halaman Pemerikassan Pasien (halaman index periksa pasien)
	Route::post('/pemeriksaanPasien/getPasien', 'PemeriksaanPasienController@getPasien');
	Route::get('/pemeriksaanPasien/{id}', 'PemeriksaanPasienController@index')->name('PemeriksaanPasien');

});

