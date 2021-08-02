<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    public function register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nim' => 'required',
            'tahun_lulus' => 'required',
            'kode_prodi' => 'required',
            'nama_lengkap' => 'required',
            'no_telepon' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'judul_skripsi' => 'required'
        ]);

        if( $validate->fails() ){
            return response()->json([
                'status'   => false,
                'message'  => 'Fields Required',
                'errors'   => $validate->errors()
            ], 422);
        }

        //check nim
        $check_nim = Mahasiswa::where('nim', $request->nim)->first();

        if( $check_nim ) {
            return response()->json([
                'status'   => false,
                'message'  => 'Nim sudah ada'
            ], 404);
        }

        $check_email = Mahasiswa::where('email', $request->email)->first();
        if($check_email){
            return response()->json([
                'status'   => false,
                'message'  => 'Email sudah digunakan'
            ], 404);
        }

        $filenametostore = null;


        try{
            $image           = $request->file('photo');
            $name            = $image->getClientOriginalName();

            $filename        = pathinfo($name, PATHINFO_FILENAME);

            $extension       = $image->getClientOriginalExtension();

            $filenametostore = time().'.'.$extension;

            $add             = $image->storeAs('public/foto/mahasiswa/', $filenametostore);
        }catch(\Exception $e){
            $filenametostore = null;
        }

        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->tahun_lulus = $request->tahun_lulus;
        $mahasiswa->kode_prodi = $request->kode_prodi;
        $mahasiswa->nama_lengkap = $request->nama_lengkap;
        $mahasiswa->no_telepon = $request->no_telepon;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->email = $request->email;
        $mahasiswa->password = bcrypt('12345');
        $mahasiswa->kode_pos = $request->kode_pos;
        $mahasiswa->photo = $filenametostore;
        $mahasiswa->judul_skripsi = $request->judul_skripsi;
        $mahasiswa->status = 'pending';
        

        $mahasiswa->save();

        return response()->json([
            'status'  => true,
            'message' => 'Success register mahasiswa',
            'results' => $mahasiswa
        ]);

    }
}
