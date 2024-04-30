<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\ModelGuest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;

class GuestController extends Controller
{
    // Registrasi guest baru
    // Registrasi guest baru
public function register(Request $request)
{
    try {
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
