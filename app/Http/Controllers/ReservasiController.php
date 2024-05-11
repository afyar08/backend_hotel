<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ModelReservasi;
use Illuminate\Http\Request;
use App\Http\Resources\ModelReservasiResource;
use Illuminate\Support\Facades\Validator;

class ReservasiController extends Controller
{
    public function index()
    {
        $reservasi = ModelReservasi::all();
        return ModelReservasiResource::collection($reservasi);
    }

    public function show($id)
    {
        $reservasi = ModelReservasi::findOrFail($id);
        return new ModelReservasiResource($reservasi);
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
        return new ModelReservasiResource($reservasi);
    }

    public function update(Request $request, $id)
    {
        $reservasi = ModelReservasi::findOrFail($id);
        $reservasi->update($request->all());
        return new ModelReservasiResource($reservasi);
    }

    public function destroy($id)
    {
        $reservasi = ModelReservasi::findOrFail($id);
        $reservasi->delete();
        return response()->json(null, 204);
    }
}
