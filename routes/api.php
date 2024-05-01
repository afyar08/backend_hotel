<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ReceptionistController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/example', function () {
//     return response()->json(['message' => 'This is an example API endpoint']);
// });

Route::middleware('auth:guest')->group(function () {
    Route::post('/logout', [GuestController::class, 'logout']);
});

Route::prefix('guest')->group(function () {
    Route::post('/register', [GuestController::class, 'register']);
    Route::post('/login', [GuestController::class, 'login']);  
});

Route::middleware('auth:receptionist')->group(function () {
    // Rute untuk resepsionis
});

Route::prefix('receptionist')->group(function () {
    Route::post('/create_receptionist', [ReceptionistController::class, 'create_akun']);
    Route::post('/auth_receptionist', [ReceptionistController::class, 'login']);
});
