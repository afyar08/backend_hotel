<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelReceptionist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ReceptionistController extends Controller
{
    //
    public function create_akun(Request $request)
    {
        try {
            // Validasi request
            $validatedData = $request->validate([
                'username' => 'required|string',
                'password' => 'required|min:8',
            ]);

            // Buat instance ModelManager baru
            $passwordEncrypted = bcrypt($validatedData['password']);
            $receptionist = new ModelReceptionist([
                'username' => $validatedData['username'],
                'password' => $passwordEncrypted,
            ]);

            // Simpan data Manager ke dalam database
            $receptionist->save();

            return response()->json(['message' => 'Akun receptionist berhasil dibuat'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal membuat akun receptionist', 'error' => $e->getMessage()], 500);
        }
    }

   function login(Request $request) {
    if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
        $receptionist = Auth::user();
        $success['token'] = Str::random(60);
        // $success = Str::random(60);
        return response()->json(['success' => $success], 200);
    }
    else{
        return response()->json(['error' => 'Unauthorised'], 401);
    }
   }
}

