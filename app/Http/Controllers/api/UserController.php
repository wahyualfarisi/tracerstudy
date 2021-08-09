<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return response()->json([
            'status'   => true,
            'results'  => User::all()
        ]);
    }

    public function create(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'nama_lengkap' => 'required',
            'password' => 'required',
            'level' => 'required'
        ]);

        if( $validate->fails() ) return response()->json([
            'status' => false,
            'message' => 'Fields Required',
            'errors' => $validate->errors()
        ]);

        //check email
        $check = User::where('email', $request->email)->first();
        if( $check )
        return response()->json([
            'status' => false,
            'message' => 'Email sudah di gunakan'
        ]);

        $user = new User;
        $user->email = $request->email;
        $user->password = bcrypt( $request->password );
        $user->nama_lengkap = $request->nama_lengkap;
        $user->level = $request->level;
        $user->save();

        return response()->json([
            'status'   => true,
            'message'  => 'Berhasil menambahkan user',
            'results'  => $user
        ]);
    }

    public function update(Request $request, $id_user)
    {   
        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'nama_lengkap' => 'required',
            'password' => 'required',
            'level' => 'required'
        ]);

        if( $validate->fails() ) return response()->json([
            'status' => false,
            'message' => 'Fields Required',
            'errors' => $validate->errors()
        ]);

        $findUser = User::findOrFail($id_user);

        $findUser->email = $request->email;
        $findUser->nama_lengkap = $request->nama_lengkap;
        $findUser->password = $request->password;
        $findUser->level = $request->level;
        $findUser->update();

        return response()->json([
            'status'   => true,
            'message'  => 'Berhasil update user'
        ]);
    }
}
