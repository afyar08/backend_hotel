<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelReservasi;
use App\Models\ModelGuest;
use App\Models\ModelKamar;
use Illuminate\Http\Request;


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
    // Ambil data reservasi beserta informasi kamar, tipe kamar, dan tamu terkait
    $reservations = ModelReservasi::with(['kamar.tipeKamar', 'tamu'])->get();

    // Format data sesuai kebutuhan
    $formattedReservations = $reservations->map(function ($reservation) {
        return [
            'name' => $reservation->tamu->nama, // Ambil nama tamu dari relasi
            'roomNumber' => $reservation->kamar->no_kamar, // Ambil nomor kamar dari relasi
            'roomType' => $reservation->kamar->tipeKamar->nama_tipe, // Ambil nama tipe kamar dari relasi
            'bookId' => $reservation->id, // Ambil ID reservasi
            'status' => $reservation->kamar->status_reservasi, // Ambil status reservasi
            'checkInDate' => $reservation->tgl_check_in, // Ambil tanggal check-in
            'checkOutDate' => $reservation->tgl_check_out, // Ambil tanggal check-out
            'roomTypeImage' => $reservation->kamar->tipeKamar->gambar,
        ];
    });

    // Return data yang diformat
    return response()->json($formattedReservations);
}

public function show($id)
{
    // Temukan data reservasi berdasarkan ID
    $reservation = ModelReservasi::with(['kamar.tipeKamar', 'tamu'])->find($id);

    // Jika data tidak ditemukan, kembalikan response 404
    if (!$reservation) {
        return response()->json(['error' => 'Reservasi tidak ditemukan'], 404);
    }

    // Format data reservasi
    $formattedReservation = [
        'room_plan' => $reservation->room_plan,
        'reservation_by' => $reservation->reservation_by,
        'request' => $reservation->request,
        'duration' => $reservation->duration,
        'room_total' => $reservation->room_total,
        'adult' => $reservation->adult,
        'children' => $reservation->children,
        'extra' => $reservation->extra,
        'sub_total' => $reservation->sub_total,
        'harga_per_kamar' => $reservation->kamar->harga,
    ];

    // Return data yang diformat
    return response()->json($formattedReservation);
}


    public function destroy($id)
    {
        $reservasi = ModelReservasi::findOrFail($id);
        $reservasi->delete();
        return response()->json(null, 204);
    }

    

}
