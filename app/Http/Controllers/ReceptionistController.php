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

    public function login(Request $request) {
        // Lakukan percobaan otentikasi menggunakan metode Auth::attempt dengan menggunakan guard 'receptionist'
        if(Auth::guard('receptionist')->attempt(['username' => $request->username, 'password' => $request->password])){
            // Jika otentikasi berhasil, ambil informasi pengguna
            $receptionist = Auth::guard('receptionist')->user();
            
            // Buat token acak untuk pengguna yang berhasil login
            $success['token'] = Str::random(60);
            
            // Kirim respons JSON dengan token dan status HTTP 200 (OK)
            return response()->json(['success' => $success], 200);
        } else {
            // Jika otentikasi gagal, kirim respons JSON dengan pesan kesalahan dan status HTTP 401 (Unauthorized)
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return response()->json(['success' => 'anda berhasil logout', 200]);
    }
    
}

