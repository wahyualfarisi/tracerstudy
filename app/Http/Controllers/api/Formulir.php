<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Pertanyaan;
use App\Jawaban;

class Formulir extends Controller
{
    public function getPertanyaan(){
        return response()->json([
            'status'   => true,
            'message'  => 'Fetch all pertanyaan',
            'results'  => Pertanyaan::with('getJawabans')->get()
        ]);
    }

    public function createPertanyaan(Request $request) {
        $validator = Validator::make($request->all(), [
            'pertanyaan' => 'required',
            'jawaban' => 'required',
            'jawaban.*' => 'required|string|distinct'
        ]);

        if( $validator->fails() ){
            return response()->json([
                'status'   => false,
                'message'  => 'Fields Required',
                'errors'  => $validator->errors()
            ]);
        }

        $pertanyaan = new Pertanyaan;
        $pertanyaan->pertanyaan = $request->pertanyaan;
        $pertanyaan->save();

        $jawaban_data = array();
        foreach($request['jawaban'] as $key => $val){
            try {
                $jawaban = new Jawaban;
                $jawaban->id_pertanyaan = $pertanyaan->id_pertanyaan;
                $jawaban->jawaban = $request['jawaban'][$key];
                $jawaban->save();

                $jawaban_data[] = $jawaban;
            } catch (\Exception $e) {

                DB::rollback();
                return response()->json([
                    'status' => false,
                    'message' => 'Failed add SOP',
                ], 500);
            }
        }

        return response()->json([
            'status'   => true,
            'message'  => 'Success create pertanyaan',
            'results'  => $pertanyaan
        ]);
    }


    public function updatePertanyaan( Request $request, $id_pertanyaan ) {
        $findPertanyaan = Pertanyaan::findOrFail($id_pertanyaan);

        $validator = Validator::make($request->all(), [
            'pertanyaan' => 'required',
        ]);

        if( $validator->fails() ){
            return response()->json([
                'status'   => false,
                'message'  => 'Fields Required',
                'errors'  => $validator->errors()
            ]);
        }

        $findPertanyaan->pertanyaan = $request->pertanyaan;
        $findPertanyaan->update();

        return response()->json([
            'status'   => true,
            'message'  => 'Success create pertanyaan',
            'results'  => $findPertanyaan
        ]);
    }

    
}
