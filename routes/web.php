<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController; 
use App\Models\ActivityLog; 
use App\Models\Transaction; 

/*
|--------------------------------------------------------------------------
| Web Routes (Versi Rapih)
|--------------------------------------------------------------------------
*/

// --- 1. HALAMAN PUBLIK ---
Route::get('/', function () {
    return view('landing');
});

Route::get('/harga', function () {
    return view('harga');
})->name('harga');


// --- 2. AUTHENTICATION (LOGIN & REGISTER) ---

// A. Login
// Menampilkan Form Login
Route::get('/masuk', function () {
    return view('login'); 
})->name('login'); 

// Memproses Data Login (POST)
Route::post('/login-proses', [AuthController::class, 'login'])->name('login.submit');

// B. Register (Daftar Akun)
// UBAH: Ganti nama route dari 'register.form' menjadi 'register'
Route::get('/daftar', function () {
    return view('register'); 
})->name('register'); 

// Route proses tetap sama
Route::post('/register-proses', [AuthController::class, 'register'])->name('register.submit');
// C. Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// --- 3. HALAMAN DASHBOARD (DILINDUNGI LOGIN) ---
Route::get('/dashboard', function () {
    
    // Kita hapus "if (!Auth::check)" manual karena sudah ditangani oleh middleware('auth') di bawah
    
    $activities = ActivityLog::where('user_id', Auth::id())
                    ->latest()
                    ->take(10)
                    ->get();

    $transactions = Transaction::latest()->get(); 

    return view('dashboard', compact('activities', 'transactions'));

})->middleware('auth')->name('dashboard');


// --- 4. ROUTE LAINNYA ---
Route::post('/submit-booking', [BookingController::class, 'store']);