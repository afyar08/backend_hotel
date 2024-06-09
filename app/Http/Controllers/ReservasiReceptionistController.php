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
            'checkInDate' => $reservation->tgl_check_out, // Ambil tanggal check-in
            'checkOutDate' => $reservation->tgl_check_in, // Ambil tanggal check-out
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
    ];

    // Return data yang diformat
    return response()->json($formattedReservation);
}
    public function inHouseGuest(){
    $guests = ModelReservasi::with(['kamar', 'tamu'])->get();
    $guestData = [];

    foreach ($guests as $guest) {
        $guestInfo = [
            'tamu' => $guest->tamu,
            'kamar' => $guest->kamar,
            'tipe_kamar' => $guest->kamar->tipeKamar,
            'status_reservasi' => $guest->kamar->status_reservasi
        ];
        if ($guestInfo['status_reservasi'] == 'reserved' || $guestInfo['status_reservasi'] == 'check in' ) {
            
            $guestData[] = $guestInfo;
        }

        
    }

    return response()->json($guestData);
}


}
