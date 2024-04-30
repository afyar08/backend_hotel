<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\ModelGuest;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    // Registrasi guest baru
    public function register(Request $request)
    {
        // Validasi input dari request
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
            'kategori' => 'required|in:ON,BP',
            'email' => [
                'required',
                Rule::unique('guests')->when(function ($request) {
                    return $request->kategori === 'ON';
                }),
                'email',
            ],
            'password' => 'required_if:kategori,ON|string|min:6',
        ]);

        // Buat guest baru
        $guest = ModelGuest::create($validatedData);

        return response()->json(['message' => 'Registrasi berhasil', 'guest' => $guest]);
    }

    // Login guest
    public function login(Request $request)
    {
        // Validasi input dari request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Lakukan autentikasi
        if (Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Login berhasil', 'user' => auth()->user()]);
        } else {
            return response()->json(['message' => 'Login gagal'], 401);
        }
    }

    // Logout guest
    public function logout(Request $request)
    {
        // Lakukan logout
        auth()->logout();

        return response()->json(['message' => 'Logout berhasil']);
    }
}
