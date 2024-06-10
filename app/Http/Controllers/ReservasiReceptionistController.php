<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelReservasi;
use App\Models\ModelGuest;
use App\Models\ModelKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



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


    public function destroy($id)
    {
        $reservasi = ModelReservasi::findOrFail($id);
        $reservasi->delete();
        return response()->json(null, 204);
    }

    public function createReservation(Request $request)
    {
        DB::beginTransaction();
    
        try {
            // Log request data for debugging
            \Log::debug('Request data:', $request->all());
    
            // Membuat guest baru
            $guest = ModelGuest::create([
                'nama' => $request->input('title') . ' ' . $request->input('first_name') . ' ' . $request->input('last_name'),
                'email' => $request->input('email'),
                'no_telp' => $request->input('no_telp'),
                'kategori' => 'BP',  // Anda bisa mengatur kategori sesuai kebutuhan
            ]);
    
            // Log guest data for debugging
            \Log::debug('Guest created:', $guest->toArray());
    
            // Membuat reservasi baru
            $reservation = ModelReservasi::create([
                'tgl_check_in' => $request->input('tgl_check_in'),
                'tgl_check_out' => $request->input('tgl_check_out'),
                'duration' => $request->input('duration'),
                'id_tamu' => $guest->id,
                'detail_tamu' => $guest->nama, // Adding detail_tamu
                'pembayaran' => $request->input('pembayaran'),
                'total_bayar' => $request->input('total_bayar'),
                'status_pembayaran' => $request->input('status_pembayaran'),
                'id_kamar' => $request->input('id_kamar'),
                'id_resepsionis' => $request->input('id_resepsionis'),
                'room_plan' => $request->input('room_plan'),
                'request' => $request->input('request'),
                'reservation_by' => $request->input('reservation_by'),
                'room_total' => $request->input('room_total'),
                'adult' => $request->input('adult'),
                'children' => $request->input('children'),
                'extra' => $request->input('extra'),
                'sub_total' => $request->input('sub_total'),
            ]);
    
            DB::commit();
    
            return response()->json(['message' => 'Reservation created successfully', 'reservation' => $reservation], 201);
        } catch (\Exception $e) {
            DB::rollBack();
    
            // Log the error message
            \Log::error('Failed to create reservation: ' . $e->getMessage());
    
            // Print the stack trace to the log
            \Log::error($e->getTraceAsString());
    
            return response()->json(['message' => 'Failed to create reservation', 'error' => $e->getMessage()], 500);
        }
    }
    
    
}
