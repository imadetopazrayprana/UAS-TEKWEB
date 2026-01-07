<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ActivityLog; // Pastikan Model ini ada
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Fungsi Menangani Login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Coba login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // --- LOGIC PENCATATAN LOG AKTIVITAS (Login) ---
            ActivityLog::create([
                'user_id' => Auth::id(),
                'action' => 'Login',          // <--- SUDAH DIPERBAIKI (WAJIB ADA)
                'description' => 'Login Berhasil',
                // 'ip_address' => $request->ip(),             // Aktifkan jika kolom ip_address sudah ada di DB
                // 'user_agent' => $request->header('User-Agent'), // Aktifkan jika kolom user_agent sudah ada di DB
            ]);
            // ----------------------------------------------

            return redirect()->intended('dashboard'); // Redirect ke dashboard jika sukses
        }

        // Jika gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Fungsi Menangani Register (Daftar)
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat User Baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Fungsi Logout
    public function logout(Request $request)
    {
        // --- LOGIC PENCATATAN LOG AKTIVITAS (Logout) ---
        if (Auth::check()) {
            ActivityLog::create([
                'user_id' => Auth::id(),
                'action' => 'Logout',         // <--- SUDAH DIPERBAIKI (WAJIB ADA)
                'description' => 'User Logout',
            ]);
        }
        // -----------------------------------------------

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}