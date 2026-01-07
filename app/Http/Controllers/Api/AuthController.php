<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ActivityLog; // Memanggil Model Log Aktivitas Anda

class AuthController extends Controller
{
    // === LOGIN API ===
    public function login(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Cek Credential (Email & Password)
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // 3. Buat Token (Ini kunci masuk API)
            // Token ini akan dipakai user untuk request booking nanti
            $token = $user->createToken('auth_token')->plainTextToken;

            // 4. Catat ke ActivityLog (Sesuai kode lama Anda)
            try {
                ActivityLog::create([
                    'user_id' => $user->id,
                    'action' => 'Login API',
                    'description' => 'Login via API Berhasil',
                    // Gunakan null coalescing (??) untuk jaga-jaga jika ip/agent kosong
                    'ip_address' => $request->ip(), 
                    'user_agent' => $request->header('User-Agent'),
                ]);
            } catch (\Exception $e) {
                // Biarkan lanjut walau log gagal, supaya user tetap bisa login
            }

            // 5. Kirim Balikan JSON Sukses
            return response()->json([
                'status' => 'success',
                'message' => 'Login berhasil',
                'data' => [
                    'user' => $user,
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                ]
            ], 200);
        }

        // Jika Gagal Login
        return response()->json([
            'status' => 'error',
            'message' => 'Email atau Password salah',
        ], 401);
    }

    // === LOGOUT API ===
    public function logout(Request $request)
    {
        // Hapus token yang sedang dipakai saat ini
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Logout berhasil'
        ], 200);
    }
}