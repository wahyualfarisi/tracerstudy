<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Mahasiswa;

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
}
