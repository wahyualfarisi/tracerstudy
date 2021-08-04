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
    public function dataMahasiswaPending(){
        return view('dataMahasiswaPending');
    }
    public function detailMahasiswa($id_mahasiswa){
        $data['id'] = $id_mahasiswa;
        return view('detailMahasiswa', $data);
    }

    public function jadwalPengisian(){
        return view('jadwalPengisian');
    }
    public function detailJadwal($id_jadwal){
        $data['id'] = $id_jadwal;
        return view('detailJadwal', $data);
    }
    public function lihatFormulirMahasiswa($id_mahasiswa){
        $data['id'] = $id_mahasiswa;
        return view('lihatFormulir', $data);
    }

    public function buatJadwal(){
        return view('buatJadwal');
    }

    public function laporan(){
        return view('laporan');
    }

    //Mahasiswa route
    public function formulir(){
        return view('mahasiswa/formulir');
    }
    public function datadiri(){
        return view('mahasiswa/datadiri');
    }
    public function datapekerjaan(){
        return view('mahasiswa/datapekerjaan');
    }
    public function addPekerjaan(){
        return view('mahasiswa/tambahPekerjaan');
    }
    public function pengisianFormulir(){
        return view('mahasiswa/pengisianFormulir');
    }

    
}
