<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Mahasiswa;
use App\JadwalPengisian;
use App\Pertanyaan;
use App\Pengisian;


class DashboardController extends Controller
{
    public function full(Request $request)
    {
        $year = [2019, 2020, 2021];

        //get total mahasiswa
        $data = [];
        $sudah_bekerja = [];
        $belum_bekerja = [];
        for($i = 0; $i<count($year); $i++){
            $data[$year[$i]] = Mahasiswa::where('tahun_lulus', $year[$i])->count();
            $sudah_bekerja[$year[$i]] = Mahasiswa::has('getPekerjaans', '>', 0)->where('tahun_lulus', $year[$i])->count();
            $belum_bekerja[$year[$i]] = Mahasiswa::has('getPekerjaans', '=', 0)->where('tahun_lulus', $year[$i])->count();
        }

        return response()->json([
            'status' => true,
            'message' => 'Full Dashboard',
            'results' => [
                'total_mahasiswa' => $data,
                'sudah_bekerja' => $sudah_bekerja,
                'belum_bekerja' => $belum_bekerja
            ]
        ]);
    }

    public function laporan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tahun_kelulusan' => 'required'
        ]);

        if($validator->fails())
        return response()->json([
            'status'   => false,
            'message'  => 'Fields required',
            'errors' => $validator->errors()
        ]);

        $jadwal = JadwalPengisian::with('getpengisianDetails')->where('tahun_kelulusan', $request->tahun_kelulusan)->first();
        
        $jadwal_detail = JadwalPengisian::with(['dibuatOleh','getDataPengisian.getMahasiswa'])
        ->where('id_jadwal', $jadwal->id_jadwal)
        ->first();

        $id_mahasiswa_yang_sudah_mengisi = Pengisian::where('id_jadwal', $jadwal->id_jadwal)->pluck('id_mahasiswa');

        $get_mahasiswa_yang_belum_mengisi = Mahasiswa::where('tahun_lulus', $jadwal->tahun_kelulusan)
        ->whereNotIn('id_mahasiswa', $id_mahasiswa_yang_sudah_mengisi)
        ->get();

        $pertanyaan = Pertanyaan::with('getJawabans')->get();
        
        return response()->json([
            'status'  => true,
            'message'  => 'Laporan',
            'results' => [
                'isian' => $jadwal,
                'pertanyaan' => $pertanyaan,
                'jadwal' => $jadwal_detail,
                'belum_mengisi' => $get_mahasiswa_yang_belum_mengisi
            ]
        ]);

        

    }
}
