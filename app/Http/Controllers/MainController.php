<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Illuminate\Support\Facades\Crypt;

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
    public function addDataMaster(){
        return view('addDataMaster');
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
    public function editJadwal($id_jadwal){
        $data['id'] = $id_jadwal;
        return view('editJadwal', $data);
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
    public function laporan_results($year){
        $data['year'] = $year;
        return view('resultsLaporan', $data);
    }

    
    //Users
    public function dataUser(){
        return view('dataUser');
    }
    public function addUser() {
        return view('addUser');
    }
    public function updateUser($id_user) {
        $getUser = User::findOrFail($id_user);
        $data['id'] = $id_user;
        $data['user'] = $getUser;
        return view('updateUser', $data);
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
