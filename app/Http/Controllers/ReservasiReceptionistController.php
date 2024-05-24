<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelReservasi;
use App\Models\ModelGuest;
use App\Models\ModelKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservasiReceptionistController extends Controller
{
    public function index()
    {
        // Mengambil daftar semua reservasi dari database
        $reservasi = ModelReservasi::all();

        // Mengembalikan data reservasi dalam format JSON
        return response()->json($reservasi);
    }

    public function getReservationData()
{
    // Ambil data reservasi beserta informasi kamar dan tipe kamar terkait
    $reservations = ModelReservasi::with('kamar.tipeKamar')->get();

    // Format data sesuai kebutuhan
    $formattedReservations = $reservations->map(function ($reservation) {
        return [
            'name' => $reservation->tamu->nama, // Ambil nama tamu dari relasi
            'roomNumber' => $reservation->kamar->no_kamar, // Ambil nomor kamar dari relasi
            'roomType' => $reservation->kamar->tipeKamar->nama_tipe, // Ambil nama tipe kamar dari relasi
            'bookId' => $reservation->id, // Ambil ID reservasi
            'status' => $reservation->kamar->status_reservasi, // Ambil status reservasi
            'checkInDate' => $reservation->tgl_check_out, // Ambil tanggal check-in
            'checkOutDate' => $reservation->tgl_check_in, // Ambil tanggal check-out
        ];
    });

    // Return data yang diformat
    return response()->json($formattedReservations);
}

    public function show($id)
    {
        
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_kamar' => 'required',
            'id_tamu' => 'required',
            'id_resepsionis' => 'required',
            'tgl_check_in' => 'required',
            'tgl_check_out' => 'required',
            'total_bayar' => 'required',
            'pembayaran' => 'required',
            'status_pembayaran' => 'required',
            'detail_tamu' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $reservasi = ModelReservasi::create($request->all());
        
    }

    public function update(Request $request, $id)
    {
        $reservasi = ModelReservasi::findOrFail($id);
        $reservasi->update($request->all());
        
    }

    public function destroy($id)
    {
        $reservasi = ModelReservasi::findOrFail($id);
        $reservasi->delete();
        return response()->json(null, 204);
    }

    
}
