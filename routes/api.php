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


//Auth Controller
Route::post('/login', 'api\AuthController@login');