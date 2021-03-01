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
Route::post('/prosesloginsiswa', 'SiswaController@login');
Route::get('/logout', 'LoginController@logout');
Route::get('/logoutsiswa', 'SiswaController@logout');

// petugas
Route::group(['middleware' => 'auth:admin'], function(){
    Route::get('/dashboard', 'DashboardController@index');

    //siswa
    Route::resource('siswa', 'SiswaController');
    Route::get('siswa_history/{id}', 'SiswaController@History')->name('siswa.history');
    //Kelas
    Route::resource('kelas', 'KelasController');

    //Petugas
    Route::resource('petugas', 'PetugasController');

    //Spp
    Route::resource('spp', 'SppController');

    //Transaksi
    Route::get('transaksi', 'TransaksiController@index');
    Route::get('transaksi_cari', 'TransaksiController@cari');
    Route::get('transaksi_bayar/{id}', 'TransaksiController@bayar')->name('transaksi.bayar');
    Route::get('transaksi_batal/{id}', 'TransaksiController@batal')->name('transaksi.batal');
    Route::get('transaksi_pdf/{id}', 'TransaksiController@pdf')->name('transaksi.pdf');

    // Laporan
    Route::get('data_guru','LaporanController@index');
    Route::get('data_guru_cetak','LaporanController@cetakguru');
    Route::get('data_siswa','LaporanController@datasiswa');
    Route::get('data_siswa_cetak','LaporanController@datasiswacetak');
    Route::view('rekap', 'admin/laporan.rekap');
    Route::get('cetak', 'LaporanController@cetak');
});

Route::group(['middleware'=>'auth:siswa'], function(){
    Route::get('siswa_depan','SiswaController@depan');
    Route::get('siswa_history\{id}','SiswaController@historysiswa')->name('siswa.his');
});
// siswa


