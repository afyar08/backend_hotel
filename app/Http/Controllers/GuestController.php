<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\ModelGuest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;



class GuestController extends Controller
{
    // Registrasi guest baru
    // Registrasi guest baru
public function register(Request $request)
{
    try {

        Log::info('Data yang diterima untuk registrasi:', $request->all());

        // Validasi input dari request
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
            'kategori' => 'required|in:ON,BP',
            'email' => [
                'required',
                'email',
                Rule::unique('guests')->where(function ($query) use ($request) {
                    return $query->where('kategori', $request->kategori);
                }),
            ],
            'password' => 'required_if:kategori,ON|string|min:6',
        ]);

        // Hash password
        $validatedData['password'] = Hash::make($validatedData['password']);
        // Buat guest baru
        $guest = ModelGuest::create($validatedData);

        return response()->json(['message' => 'Registrasi berhasil', 'guest' => $guest]);
    } catch (ValidationException $e) {
        // Tangani kesalahan validasi
        return response()->json(['message' => 'Validasi gagal', 'errors' => $e->errors()], 422);
    } catch (QueryException $e) {
        // Tangani kesalahan kueri (misalnya, kesalahan unik)
        return response()->json(['message' => 'Registrasi gagal', 'error' => $e->getMessage()], 500);
    } catch (\Exception $e) {
        // Tangani kesalahan umum
        return response()->json(['message' => 'Terjadi kesalahan internal', 'error' => $e->getMessage()], 500);
    }
}

public function login(Request $request)
    {
        try {
            // Validasi input dari request
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            // Lakukan autentikasi menggunakan guard 'guest'
            if (Auth::guard('guest')->attempt($request->only('email', 'password'))) {
                // Jika autentikasi berhasil, ambil informasi pengguna
                $guest = Auth::guard('guest')->user();
                
                // Buat token acak untuk pengguna yang berhasil login
                $token = Str::random(60);
                
                // Kirim respons JSON dengan token dan status HTTP 200 (OK)
                return response()->json(['message' => 'Login berhasil', 'token' => $token]);
            } else {
                // Jika autentikasi gagal, kirim respons JSON dengan pesan kesalahan dan status HTTP 401 (Unauthorized)
                return response()->json(['message' => 'Kombinasi email dan password salah'], 401);
            }
        } catch (\Exception $e) {
            // Tangani kesalahan umum
            return response()->json(['message' => 'Terjadi kesalahan saat login', 'error' => $e->getMessage()], 500);
        }
    }
    // Logout guest
    public function logout(Request $request)
    {
        // Lakukan logout
        Auth::guard('guest')->logout();

        return response()->json(['message' => 'Logout berhasil']);
    }

}
