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
Route::post('/mahasiswa/update_status/{id_mahasiswa}', 'MahasiswaController@mahasiswa_update');
Route::post('/mahasiswa/upload_foto', 'MahasiswaController@upload_photo');
Route::post('/mahasiswa/update/{id_mahasiswa}', 'MahasiswaController@updateMahasiswa');


//Auth Controller
Route::post('/login', 'api\AuthController@login');

Route::get('/pertanyaan', 'api\Formulir@getPertanyaan');
Route::post('/pertanyaan/create', 'api\Formulir@createPertanyaan');
Route::post('/pertanyaan/update/{id_pertanyaan}', 'api\Formulir@updatePertanyaan');

//Pengisian
Route::get('/pengisian/getListJadwal', 'api\PengisianController@getListJadwal');
Route::get('/pengisian/detailJadwal/{id_jadwal}', 'api\PengisianController@getDetailJadwal');

Route::post('/pengisian/createJadwal', 'api\PengisianController@createJadwal');
Route::post('/pengisian/editJadwal/{id_jadwal}', 'api\PengisianController@editJadwal');
Route::get('/pengisian/checkJadwalForMahasiswa/{id_mahasiswa}', 'api\PengisianController@checkJadwalForMahasiswa');
Route::post('/pengisian/startPengisian', 'api\PengisianController@startPengisian');
Route::get('/pengisian/getFormulirMahasiswa/{id_mahasiswa}', 'api\PengisianController@getFormulirMahasiswa');
Route::post('/pengisian/isi/formulir', 'api\PengisianController@isiFormulir');
Route::post('/pengisian/submitFormulir', 'api\PengisianController@submitFormulir');

//Dashboard
Route::get('/dashboard/full', 'api\DashboardController@full');
Route::get('/laporan', 'api\DashboardController@laporan');

//User
Route::get('/user', 'api\UserController@index');
Route::post('/user/add', 'api\UserController@create');
Route::post('/user/update/{id_user}', 'api\UserController@update');