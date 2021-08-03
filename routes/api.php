<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/mahasiswa', 'MahasiswaController@index');
Route::post('/mahasiswa/register', 'MahasiswaController@register');
Route::post('/mahasiswa/addPekerjaan', 'MahasiswaController@addPekerjaan');
Route::get('/mahasiswa/{id_mahasiswa}', 'MahasiswaController@show');
Route::get('/mahasiswa/foto/{filename}', 'MahasiswaController@mahasiswa_foto');
Route::post('/mahasiswa/update/{id_mahasiswa}', 'MahasiswaController@mahasiswa_update');


//Auth Controller
Route::post('/login', 'api\AuthController@login');

Route::get('/pertanyaan', 'api\Formulir@getPertanyaan');

//Pengisian
Route::get('/pengisian/getListJadwal', 'api\PengisianController@getListJadwal');
Route::post('/pengisian/createJadwal', 'api\PengisianController@createJadwal');
Route::post('/pengisian/editJadwal/{id_jadwal}', 'api\PengisianController@editJadwal');
Route::post('/pengisian/checkJadwalForMahasiswa/{id_mahasiswa}', 'api\PengisianController@checkJadwalForMahasiswa');
Route::post('/pengisian/startPengisian', 'api\PengisianController@startPengisian');
Route::get('/pengisian/getFormulirMahasiswa', 'api\PengisianController@getFormulirMahasiswa');