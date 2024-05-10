<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelTipeKamar;

class TipeKamarController extends Controller
{
    public function get() {
        $tipeKamar = ModelTipeKamar::all();
        return response()->json($tipeKamar);
    }
}
