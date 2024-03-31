<?php

namespace App\Http\Controllers;

use App\Models\ModelManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;


class AdminManagerController extends Controller
{
    public function create_akun(Request $request)
    {
        try {
            // Validasi request
            $validatedData = $request->validate([
                'nama' => 'required|string',
                'email' => 'required|email|unique:managers,email',
                'password' => 'required|min:8',
            ]);

            // Buat instance ModelManager baru
            $passwordEncrypted = Crypt::encryptString($validatedData['password']);
            $manager = new ModelManager([
                'nama' => $validatedData['nama'],
                'email' => $validatedData['email'],
                'password' => $passwordEncrypted,
            ]);

            // Simpan data Manager ke dalam database
            $manager->save();

            return response()->json(['message' => 'Akun Manager berhasil dibuat'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal membuat akun Manager', 'error' => $e->getMessage()], 500);
        }
    }

    public function read_akun()
    {
        try {
            //ambil data
            $managers = ModelManager::all();

            return response()->json(['managers' => $managers], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal membaca data managers','error' => $e->getMessage()], 500);
        }
    }

    public function update_akun(Request $request, $id)
{
    try {
        $manager = ModelManager::findOrFail($id);
        $validatedData = $request->validate([
            'nama' => 'sometimes|required|string',
            'email' => 'sometimes|required|email|unique:managers,email,' . $manager->id,
            'password' => 'sometimes|required|min:8',
        ]); 

        if (isset($validatedData['nama'])) {
            $manager->nama = $validatedData['nama'];
        }

        if (isset($validatedData['email'])) {
            $manager->email = $validatedData['email'];
        }

        if (isset($validatedData['password'])) {
            $passwordEncrypted = Crypt::encryptString($validatedData['password']);
            $manager->password = $passwordEncrypted;
        }

        $manager->save();
        
        return response()->json(['message' => 'Akun Manager berhasil diperbaharui'], 200);

    } catch (\Exception $e) {
        return response()->json(['message' => 'Gagal memperbaharui akun manager', 'error' => $e->getMessage()], 500);
    }
}


    public function delete_akun($id)
    {
        try {
            $manager = ModelManager::findOrFail($id);
            $manager->delete();

            return response()->json(['message' => 'Akun berhasil dihapus'], 200);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus akun', 'error' => $e->getMessage()], 500);
        }
    }
}
