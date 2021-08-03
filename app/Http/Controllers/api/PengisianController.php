<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\JadwalPengisian;
use App\Pengisian;
use App\PengisianDetail;
use App\Mahasiswa;
use App\Pertanyaan;
use Illuminate\Support\Facades\Validator;


class PengisianController extends Controller
{
    public function getListJadwal(){
        return response()->json([
            'status' => true,
            'message' => 'get list jadwal',
            'results' => JadwalPengisian::with('dibuatOleh')->get()
        ]);
    }

    public function createJadwal(Request $request) {
        $validator = Validator::make($request->all(), [
            'tanggal_dimulai' => 'required',
            'tanggal_selesai' => 'required',
            'tahun_kelulusan' => 'required',
            'id_user' => 'required'                
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        $checkJadwal = JadwalPengisian::where('tahun_kelulusan', $request->tahun_kelulusan)->first();
        if($checkJadwal){
            return response()->json([
                'status'   => false,
                'message'  => 'Jadwal sudah ada untuk tahun kelulusan '.$request->tahun_kelulusan
            ]);
        }

        $newJadwal = new JadwalPengisian;
        $newJadwal->tanggal_dimulai = $request->tanggal_dimulai;
        $newJadwal->tanggal_selesai = $request->tanggal_selesai;
        $newJadwal->tahun_kelulusan = $request->tahun_kelulusan;
        $newJadwal->id_user = $request->id_user;
        $newJadwal->save();

        return response()->json([
            'status'   => true,
            'message'  => 'Berhasil membuat jadwal',
            'results' => $newJadwal
        ]);

    }

    public function editJadwal(Request $request, $id_jadwal) {
        $validator = Validator::make($request->all(), [
            'tanggal_dimulai' => 'required',
            'tanggal_selesai' => 'required'      
        ]);

        if( $validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Field Required',
                'errors' => $validator->errors()
            ]);
        }

        $check = JadwalPengisian::where('id_jadwal', $id_jadwal)->first();

        if(!$check){
            return response()->json([
                'status' => false,
                'message' => 'Jadwal Tidak ada'
            ]);
        }

        $check->tanggal_dimulai = $request->tanggal_dimulai;
        $check->tanggal_selesai = $request->tanggal_selesai;
        $check->update();

        return response()->json([
            'status'   => true,
            'message'  => 'Berhasil merubah jadwal',
            'results'  => $check
        ]);

        
    }


    public function checkJadwalForMahasiswa($id_mahasiswa) {
        $mahasiswa = Mahasiswa::where('id_mahasiswa', $id_mahasiswa)->first();
        if( !$mahasiswa ){
            return response()->json([
                'status' => false,
                'message' => 'Mahasiswa not found'
            ]);
        }

        $jadwal_pengisian = JadwalPengisian::where('tahun_kelulusan', $mahasiswa->tahun_lulus)->first();

        //check apakah mahasiswa sudah melakukan pengisian
        $check_pengisian  = Pengisian::where('id_mahasiswa', $mahasiswa->id_mahasiswa)->first();        

        return response()->json([
            'status'   => true,
            'message'  => 'Check Jadwal For Mahasiswa',
            'results'  => [
                'jadwal' => $jadwal_pengisian,
                'check_pengisian' => $check_pengisian
            ]
        ]);
    }

    public function startPengisian(Request $request) {
        $validate = Validator::make( $request->all(), [
            'id_jadwal' => 'required',
            'id_mahasiswa' => 'required'
        ]);

        if( $validate->fails() ) {
            return response()->json([
                'status'   => false,
                'message'  => 'Fields Required',
                'errors' => $validate->errors()
            ]);
        }

        //check jika sudah mendaftar
        $pengisian = Pengisian::where('id_mahasiswa', $request->id_mahasiswa)->first();

        if($pengisian){
            return response()->json([
                'status'   => false,
                'message'  => 'Anda sudah mendaftar'
            ]);
        }

    
        // insert pengisian
        $newPengisian = new Pengisian;
        $newPengisian->id_jadwal = $request->id_jadwal;
        $newPengisian->id_mahasiswa = $request->id_mahasiswa;
        $newPengisian->save();


        $pertanyaan = Pertanyaan::all();
        $data = [];
        foreach($pertanyaan as $obj){
            $data[] = [
                'id_pengisian'  => $newPengisian->id_pengisian,
                'id_pertanyaan' => $obj['id_pertanyaan'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }

        PengisianDetail::insert($data);

        return response()->json([
            'status'   => true,
            'message'  => 'start pengisian'
        ]);
    }

    public function getFormulirMahasiswa(Request $request){
        
    }

}
