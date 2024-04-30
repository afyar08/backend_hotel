<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminManagerController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/example', function () {
    return response()->json(['message' => 'This is an example API endpoint']);
});

<<<<<<< HEAD
Route::prefix('admin')->group(function () {
    Route::post('/create_manager', [AdminManagerController::class, 'create_akun']);
    Route::get('/read_manager', [AdminManagerController::class, 'read_akun']);
    Route::put('/update_manager/{id}', [AdminManagerController::class, 'update_akun']);
    Route::delete('/delete_manager/{id}', [AdminManagerController::class, 'delete_akun']);
=======

Route::prefix('receptionist')->group(function () {
    Route::post('/create_receptionist', [ReceptionistController::class, 'create_akun']);
    Route::post('/auth_receptionist', [ReceptionistController::class, 'login']);
    //Route::get('/read_manager', [AdminManagerController::class, 'read_akun']);
    // Route::put('/update_manager/{id}', [AdminManagerController::class, 'update_akun']);
    // Route::delete('/delete_manager/{id}', [AdminManagerController::class, 'delete_akun']);
>>>>>>> main
});
