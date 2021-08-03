<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\JadwalPengisian;
use App\Pengisian;
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


    public function checkJadwalForMahasiswa(){

    }


}
