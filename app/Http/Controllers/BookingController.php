<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'fullName' => 'required',
            'email' => 'required|email',
            'package' => 'required',
            'passengerCount' => 'required|integer|min:1',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
        ]);

        // 2. Hitung Harga (Sederhana - Backend Logic)
        // Harga ini sebaiknya sama dengan logic di Javascript kamu
        $prices = [
            'jepang' => 12000000,
            'jakarta' => 2000000,
            'thailand' => 8000000,
            'malaysia' => 6000000,
            'singapur' => 650000,
        ];
        
        $basePrice = $prices[$request->package] ?? 0;
        $totalPrice = $basePrice * $request->passengerCount;
        
        // Tambahan biaya guide (misal 500rb per hari atau flat, sesuaikan logika kamu)
        // Disini saya buat contoh flat 100.000 jika pilih guide
        if ($request->guide == 'yes') {
            $totalPrice += 100000; 
        }

        // 3. Simpan ke Database
        Transaction::create([
            'customer_name' => $request->fullName,
            'customer_email' => $request->email,
            'customer_phone' => $request->phone,
            'package_name' => ucfirst($request->package), // Ubah 'jepang' jadi 'Jepang'
            'passenger_count' => $request->passengerCount,
            'start_date' => $request->startDate,
            'end_date' => $request->endDate,
            'transportation' => $request->transportation,
            'use_guide' => $request->guide == 'yes' ? true : false,
            'notes' => $request->notes,
            'total_price' => $totalPrice,
            'status' => 'Pending'
        ]);

        // 4. Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Pemesanan berhasil! Tim kami akan menghubungi Anda.');
    }
}