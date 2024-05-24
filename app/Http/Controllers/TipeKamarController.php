<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelTipeKamar;

class TipeKamarController extends Controller
{
    // ini untuk mendapatkan semua data dari model tipe data kamar
    public function get() {
        // Mengambil semua tipe kamar beserta harga dari kamar terkait
        $tipeKamar = ModelTipeKamar::with('kamars')->get();

        // Menyusun respons JSON
        $response = [];
        foreach ($tipeKamar as $tipe) {
            $response[] = [
                'id' => $tipe->id,
                'bed_tipe' => $tipe->bed_tipe,
                'nama_tipe' => $tipe->nama_tipe,
                'kapasitas_ruangan' => $tipe->kapasitas_ruangan,
                'gambar' => $tipe->gambar,
                'deskripsi' => $tipe->deskripsi,
                'harga' => $tipe->kamars->avg('harga') // Mengambil rata-rata harga dari kamar-kamar terkait
            ];
        }

        // Mengembalikan respons JSON
        return response()->json($response);
    }
}
