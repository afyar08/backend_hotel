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

    public function getReservationData($id)
{
    // Ambil data reservasi beserta informasi kamar, tipe kamar, dan tamu terkait
    $reservation = ModelReservasi::with(['kamar.tipeKamar', 'tamu'])->findOrFail($id);

    // Format data sesuai kebutuhan
    $formattedReservation = [
        'tgl_check_in' => $reservation->tgl_check_in,
        'tgl_check_out' => $reservation->tgl_check_out,
        'nama_tamu' => $reservation->tamu->nama,
        'nama_tipe' => $reservation->kamar->tipeKamar->nama_tipe,
        'room_plan' => $reservation->room_plan,
        'status_reservasi' => $reservation->kamar->status_reservasi,
        'no_kamar' => $reservation->kamar->no_kamar,
        'reservation_by' => $reservation->reservation_by,
        'request' => $reservation->request,
    ];

    // Return data yang diformat
    return response()->json($formattedReservation);
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
        return response()->json($reservasi, 201);
        
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
