<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mahasiswa;
use App\Pekerjaan;
use Illuminate\Support\Facades\Response;

class MahasiswaController extends Controller
{
    public function index(Request $request){
        if($request->filter_status){
            return response()->json([
                'status'  => true,
                'message' => 'Filter By Status',
                'results' => Mahasiswa::where('status', $request->filter_status)->get()
            ]);
        }

        if($request->filter_kode_prodi){
            return response()->json([
                'status'   => true,
                'message'  => 'Filter by prodi',
                'results'  => Mahasiswa::where('kode_prodi', $request->filter_kode_prodi)->get()
            ]);
        }

        return response()->json([
            'status'   => true,
            'message'  => 'All mahasiswa',
            'results'  => Mahasiswa::all()
        ]);
    }

    public function show(Request $request, $id_mahasiswa){
        
        return response()->json([
            'status'   => true,
            'results'  => Mahasiswa::with('getPekerjaans')->where('id_mahasiswa', $id_mahasiswa)->first()
        ]);
    }

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
            ]);
        }

        $check_email = Mahasiswa::where('email', $request->email)->first();
        if($check_email){
            return response()->json([
                'status'   => false,
                'message'  => 'Email sudah digunakan'
            ]);
        }

        $filenametostore = null;


        if($request->file('photo')){
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
        $mahasiswa->dospem_1 = $request->dospem_1;
        $mahasiswa->dospem_2 = $request->dospem_2;
        $mahasiswa->status = 'pending';
        

        $mahasiswa->save();

        return response()->json([
            'status'  => true,
            'message' => 'Success register mahasiswa',
            'results' => $mahasiswa
        ]);
    }

    public function addPekerjaan(Request $request){
        $validate = Validator::make($request->all(), [
            'id_mahasiswa' => 'required',
            'nama_perusahaan' => 'required',
            'pekerjaan' => 'required',
            'tanggal_bekerja' => 'required',
            'isCurrent' => 'required'
        ]);

        if( $validate->fails() ){
            return response()->json([
                'status'   => false,
                'message'  => 'Fields Required',
                'error'    => $validate->errors()
            ], 422);
        }

        $pekerjaan = new Pekerjaan;
        $pekerjaan->id_mahasiswa = $request->id_mahasiswa;
        $pekerjaan->nama_perusahaan = $request->nama_perusahaan;
        $pekerjaan->jabatan = $request->jabatan;
        $pekerjaan->pekerjaan = $request->pekerjaan;
        $pekerjaan->tanggal_bekerja = $request->tanggal_bekerja;
        $pekerjaan->tanggal_selesai = $request->tanggal_selesai;
        $pekerjaan->isCurrent = $request->isCurrent;

        $pekerjaan->save();

        return response()->json([
            'status'   => true,
            'message'  => 'Success add pekerjaan',
            'results'  => $pekerjaan
        ]);
    }


    public function mahasiswa_foto($filename)
    {
        $path = public_path().'/storage/foto/mahasiswa/'.$filename;
        return Response::download($path);
    }

    public function mahasiswa_update(Request $request, $id_mahasiswa)
    {
        if($request->update_status){
            $mahasiswa = Mahasiswa::where('id_mahasiswa', $id_mahasiswa)->first();
            $mahasiswa->status = $request->update_status;
            $mahasiswa->update();

            return response()->json([
                'status'   => true,
                'message'  => 'Berhasil merubah status',
                'results'  => $mahasiswa
            ]);
        }
    }


}
