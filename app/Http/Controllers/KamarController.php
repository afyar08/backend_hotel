<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

    // Update the room status
    $kamar->status_kamar = $request->input('status_kamar');
    $kamar->save();

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

    // Find the room by ID
    $kamar = ModelKamar::findOrFail($id);

    // Update the room reservation status
    $kamar->status_reservasi = $request->input('status_reservasi');
    $kamar->save();

    return response()->json(['message' => 'Room reservation status updated successfully']);
}

}
