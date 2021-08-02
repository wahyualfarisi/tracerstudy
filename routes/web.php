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


Route::get('/app', 'MainController@index');
Route::get('/app/dashboard', 'MainController@dashboard');
Route::get('/app/data-master', 'MainController@dataMaster');
Route::get('/app/data-mahasiswa', 'MainController@dataMahasiswa');
Route::get('/app/jadwal-pengisian', 'MainController@jadwalPengisian');
Route::get('/app/laporan', 'MainController@laporan');
