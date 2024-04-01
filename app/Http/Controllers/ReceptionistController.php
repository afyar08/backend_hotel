<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelReceptionist;

class ReceptionistController extends Controller
{
    //
    public function create_akun(Request $request)
    {
        try {
            // Validasi request
            $validatedData = $request->validate([
                'id' => 'required',
                'username' => 'required|string',
                'password' => 'required|min:8',
            ]);

            // Buat instance ModelManager baru
            $passwordEncrypted = Crypt::encryptString($validatedData['password']);
            $receptionist = new ModelReceptionist([
                'id' => $validatedData['id'],
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
       try {
            $receptionist = ModelReceptionist::get()->where('username', $request->username);
            return response()->json(['message' => $receptionist], 201);
       } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal membuat akun receptionist', 'error' => $e->getMessage()], 500);
       }
   }
}

