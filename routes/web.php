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
    return view('index');
});

Route::group(['prefix'=>'kegiatan'], function(){
    route::get('tampilkan', 'KegiatanController@show')->name('kegiatan.tampilkan');

});

Route::group(['prefix' => 'data'], function(){
    route::get('siswa','DatasiswaController@index')->name('data.siswa');
});

Route::group(['prefix'=>'tambah-data'], function(){
    route::get('siswa','DatasiswaController@create')->name('tambah-data.siswa');
});
Route::group(['prefix'=>'edit-data'], function(){
    route::get('siswa','DatasiswaController@edit')->name('edit-data.siswa');
});

Route::group(['prefix'  => 'manage-kegiatan'], function(){
    route::get('/','ManagekegiatanController@index')->name('manage-kegiatan');
    route::get('/add-form','ManagekegiatanController@create')->name('manage-kegiatan.add-form');
    route::get('/add-form/edit-kegiatan','ManagekegiatanController@edit')->name('manage-kegiatan.add-form.edit-kegiatan');
    route::post('/store', 'ManagekegiatanController@store')->name('manage-kegiatan.store');
});

Route::group(['prefix' => 'verifikasi-pendaftaran'], function(){
    route::get('/','VerifikasiController@index')->name('verifikasi-pendaftaran');
    route::get('/ulang','DaftarulangController@index')->name('verifikasi-pendaftaran.ulang');
    route::get('/peserta','PesertaController@index')->name('verifikasi-pendaftaran.peserta');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
