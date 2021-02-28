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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', 'LoginController@getLogin')->name('login');
Route::post('/proseslogin', 'LoginController@postLogin');
Route::get('/logout', 'LoginController@logout');

// petugas
Route::group(['middleware' => 'auth:admin'], function(){
    Route::view('/dashboard', 'admin/dashboard.index');

    //siswa
    Route::resource('siswa', 'SiswaController');

    //Kelas
    Route::resource('kelas', 'KelasController');

    //Petugas
    Route::resource('petugas', 'PetugasController');

    //Spp
    Route::resource('spp', 'SppController');

    //Transaksi
    Route::get('transaksi', 'TransaksiController@index');
    Route::post('transaksi_cari', 'TransaksiController@cari');
});

