<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Pertanyaan;

class Formulir extends Controller
{
    public function getPertanyaan(){
        return response()->json([
            'status'   => true,
            'message'  => 'Fetch all pertanyaan',
            'results'  => Pertanyaan::with('getJawabans')->get()
        ]);
    }
}
