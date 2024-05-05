<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelKamar;

class KamarController extends Controller
{
    function get() {
        $kamar = ModelKamar::with('tipeKamar')->get();
        return response()->json($kamar);
    }
}
