<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('main');
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function dataMaster(){
        return view('dataMaster');
    }

    public function dataMahasiswa(){
        return view('dataMahasiswa');
    }

    public function jadwalPengisian(){
        return view('jadwalPengisian');
    }

    public function laporan(){
        return view('laporan');
    }
}
