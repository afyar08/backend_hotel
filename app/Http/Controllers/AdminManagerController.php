<?php

namespace App\Http\Controllers;

use App\Models\ModelManager;
use Illuminate\Http\Request;

class AdminManagerController extends Controller
{
    public function create(Request $request)
    {
        // Validasi request
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email|unique:managers,email',
            'password' => 'required|min:8',
        ]);

        // Buat instance ModelManager baru
        $manager = new ModelManager([
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), // Enkripsi password
        ]);

        // Simpan data Manager ke dalam database
        $manager->save();

        return response()->json(['message' => 'Akun Manager berhasil dibuat'], 201);
    }
}
