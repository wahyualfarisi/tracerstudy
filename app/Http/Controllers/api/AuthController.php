<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mahasiswa;
use App\User;
use Hash;


class AuthController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
            'level' => 'required'
        ]);

        if( $validator->fails() ){
            return response()->json([
                'status'   => false,
                'message'  => 'Fields Required',
                'errors' => $validator->errors()
            ], 422);
        }

        switch($request->level)
        {
            case 'mahasiswa':
                $mhs = Mahasiswa::where('email', $request->email)->first();

                if(!$mhs) return response()->json(['status' => false, 'message' => 'Email tidak terdaftar']);
                if($mhs->status == 'pending') return response()->json(['status' => false, 'message' => 'Anda Belum di verifikasi oleh TU']);

                if( !Hash::check($request->password, $mhs->password)){
                    return response()->json([
                        'status' => false,
                        'message' => 'Password Salah'
                    ]);
                }

                return response()->json([
                    'status'   => true,
                    'message'  => 'Login berhasil',
                    'level'    => 'mahasiswa',
                    'id_mahasiswa' => $mhs->id_mahasiswa,
                    'email'    => $mhs->email,
                    'payload'  => $mhs
                ]);

             case 'TU':
                
                    $user = User::where([
                        ['email', $request->email],
                        ['level', 'TU']
                    ])->first();

                    if(!$user) return response()->json(['status' => false, 'message' => 'User not found']);

                     if( !Hash::check($request->password, $user->password)){
                        return response()->json([
                            'status' => false,
                            'message' => 'Password Salah'
                        ]);
                    }
                    return response()->json([
                        'status'   => true,
                        'message'  => 'Login Berhasil',
                        'level'    => $user->level,
                        'email'    => $user->email,
                        'id_user'  => $user->id_user,
                        'payload'  => $user
                    ]);
            return;

            case 'SBK':
                $user = User::where([
                    ['email', $request->email],
                    ['level', 'SBK']
                ])->first();

                if(!$user) return response()->json(['status' => false, 'message' => 'User not found']);

                 if( !Hash::check($request->password, $user->password)){
                    return response()->json([
                        'status' => false,
                        'message' => 'Password Salah'
                    ]);
                }
                return response()->json([
                    'status'   => true,
                    'message'  => 'Login Berhasil',
                    'level'    => $user->level,
                    'email'    => $user->email,
                    'id_user'  => $user->id_user,
                    'payload'  => $user
                ]);

            return;
        }
    }

    
}
