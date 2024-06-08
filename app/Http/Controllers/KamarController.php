<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ModelKamar;
use Illuminate\Support\Facades\Validator;

class KamarController extends Controller
{
    // ini untuk mendapatkan relasi dari db tipe kamar
    function get() {
        $kamar = ModelKamar::with('tipeKamar')->get();
        return response()->json($kamar);
    }

    public function updateRoomStatus(Request $request, $id)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'status_kamar' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }

    // Find the room by ID
    $kamar = ModelKamar::findOrFail($id);

    // Simpan status kamar sebelum diubah
    $previousStatus = $kamar->status_kamar;

    // Update the room status
    $kamar->status_kamar = $request->input('status_kamar');
    $kamar->save();

    // Jika status kamar awalnya adalah 'out of order' dan kemudian diubah menjadi status kamar apa pun
    if ($previousStatus === 'out of order' && $kamar->status_kamar !== 'out of order') {
        // Ubah status reservasi menjadi 'check out'
        $kamar->status_reservasi = 'check out';
        $kamar->save();
    }

    return response()->json(['message' => 'Room status updated successfully']);
}


public function updateRoomReserve(Request $request, $id)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'status_reservasi' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }

    try {
        // Find the room by ID
        $kamar = ModelKamar::findOrFail($id);

        // Simpan status reservasi sebelum diubah
        $previousReservasiStatus = $kamar->status_reservasi;

        // Update the room reservation status
        $kamar->status_reservasi = $request->input('status_reservasi');
        $kamar->save();

        // Jika status reservasi diubah menjadi 'check out', ubah status kamar menjadi 'dirty'
        if ($previousReservasiStatus !== 'check out' && $kamar->status_reservasi === 'check out') {
            $kamar->status_kamar = 'dirty';
            $kamar->save();
        }

        return response()->json(['message' => 'Room reservation status updated successfully']);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Failed to update room reservation status.',
            'error' => $e->getMessage(),
        ], 500);
    }
}


public function handleOutOfOrder(Request $request, $roomId)
{
    // Start database transaction
    DB::beginTransaction();

    try {
        // Find the room by its ID
        $room = ModelKamar::findOrFail($roomId);

        // Update the room status to 'Out Of Order'
        $room->status_kamar = 'out of order';
        $room->save();

        // Update the reservation status to 'Out Of Order' as well
        $room->status_reservasi = 'out of order';
        $room->save();

        // Commit the transaction
        DB::commit();

        return response()->json([
            'message' => 'Room status updated to Out Of Order and reservation status updated accordingly.',
        ], 200);
    } catch (\Exception $e) {
        // Rollback the transaction on error
        DB::rollback();

        return response()->json([
            'message' => 'Failed to update room and reservation status.',
            'error' => $e->getMessage(),
        ], 500);
    }
}


}
