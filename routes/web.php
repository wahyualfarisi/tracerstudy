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

Route::get('/login-mhs', function() {
    return view('loginmhs');
});

Route::get('/register', function() {
    return view('register');
});

Route::get('/konfirmasi_sukses', function() {
    return view('konfirmasi_sukses');
});


Route::get('/app', 'MainController@index');
Route::get('/dashboard', 'MainController@dashboard');
Route::get('/data-master', 'MainController@dataMaster');
Route::get('/data-mahasiswa', 'MainController@dataMahasiswa');
Route::get('/data-mahasiswa/pending', 'MainController@dataMahasiswaPending');
Route::get('/detailmhs/{id_mahasiswa}', 'MainController@detailMahasiswa');

Route::get('/jadwal-pengisian', 'MainController@jadwalPengisian');
Route::get('/jadwal-pengisian/{id_jadwal}', 'MainController@detailJadwal');
Route::get('/jadwal-pengisian/lihat_formulir/{id_mahasiswa}', 'MainController@lihatFormulirMahasiswa');
Route::get('/buat-jadwal', 'MainController@buatJadwal');

Route::get('/setSession', 'MainController@setSession');
Route::get('/laporan', 'MainController@laporan');
Route::get('/laporan/results/{year}', 'MainController@laporan_results');

//only mahasiswa
Route::get('/formulir', 'MainController@formulir');
Route::get('/data-diri', 'MainController@datadiri');
Route::get('/data-pekerjaan', 'MainController@datapekerjaan');
Route::get('/tambah-pekerjaan', 'MainController@addPekerjaan');
Route::get('/pengisian-formulir', 'MainController@pengisianFormulir');


