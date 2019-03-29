<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/coba', function () {

	    // return view('content.coba');
	});

Route::auth();

	Route::get('/','TwitterController@index');

	Route::resource('brand', 'BrandController');
	Route::post('/tambah','TwitterController@tambah');
	Route::delete('/hapus/','TwitterController@hapus');

	Route::post('/unduh','TwitterController@unduh');
	
	Route::get('/bersihkan','TwitterController@bersihkan');

	Route::get('/daftar_tweet','TwitterController@daftartweet');

	Route::post('/preprocessing','PreprocessingController@preprocessing');
	Route::get('/hasil_preprocessing', 'PreprocessingController@index');

	Route::get('/analisis','KlasifikasiController@analisis');
	Route::post('/klasifikasi','KlasifikasiController@klasifikasi');
	Route::post('/klas','KlasifikasiController@klas');

	// Route::get('/data_latih', function () {
	//     return view('content.data_latih');
	// });
	// Route::get('/data_latih_positif', function () {
	//     return view('content.data_latih_positif');
	// });
	// Route::get('/data_latih_negatif', function () {
	//     return view('content.data_latih_negatif');
	// });
	// Route::get('/data_latih_netral', function () {
	//     return view('content.data_latih_netral');
	// });
