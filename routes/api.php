<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// === PUBLIC ROUTES (Tidak perlu login) ===
Route::post('/login', [AuthController::class, 'login']);
// Opsional: Register kalau mau dibuat via API juga
// Route::post('/register', [AuthController::class, 'register']);


// === PROTECTED ROUTES (Harus Login / Punya Token) ===
// Kita bungkus dengan middleware 'auth:sanctum'
Route::middleware('auth:sanctum')->group(function () {
    
    // 1. Cek User Profile
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // 2. Booking Tiket
    Route::post('/booking', [BookingController::class, 'store']);

    // 3. Logout
    Route::post('/logout', [AuthController::class, 'logout']);
});