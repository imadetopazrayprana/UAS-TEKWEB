<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Transaction;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi Input
        $validator = Validator::make($request->all(), [
            'fullName'       => 'required|string',
            'email'          => 'required|email',
            'package'        => 'required|string',
            'passengerCount' => 'required|integer|min:1',
            'startDate'      => 'required|date',
            'endDate'        => 'required|date|after_or_equal:startDate',
            'guide'          => 'nullable|string',
            // Tambahan: Sebaiknya phone dikirim juga jika di DB wajib diisi
            'phone'          => 'nullable|string', 
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        // 2. Hitung Harga
        $prices = [
            'jepang'   => 12000000,
            'jakarta'  => 2000000,
            'thailand' => 8000000,
            'malaysia' => 6000000,
            'singapur' => 6500000,
        ];

        $packageKey = strtolower($request->package);
        $basePrice  = $prices[$packageKey] ?? 0;

        if ($basePrice == 0) {
            return response()->json(['status' => 'error', 'message' => 'Paket tidak ditemukan'], 404);
        }

        $totalPrice = $basePrice * $request->passengerCount;

        if ($request->guide == 'yes') {
            $totalPrice += 100000;
        }

        // 3. Simpan ke Database (SESUAIKAN KEY DENGAN MODEL ANDA)
       // ... kode di atas biarkan sama ...

        // 3. Simpan ke Database
        try {
            // Logika: Jika input guide == 'yes', maka simpan 1. Jika tidak, simpan 0.
            $isGuide = ($request->guide === 'yes') ? 1 : 0;

            $transaction = Transaction::create([
                'customer_name'   => $request->fullName,
                'customer_email'  => $request->email,
                'package_name'    => $request->package,
                'passenger_count' => $request->passengerCount,
                'start_date'      => $request->startDate,
                'end_date'        => $request->endDate,
                'total_price'     => $totalPrice,
                
                // PERBAIKAN DISINI: Kita masukkan variabel $isGuide (angka 1 atau 0)
                'use_guide'       => $isGuide, 
                
                'status'          => 'pending',
                'customer_phone'  => $request->phone ?? '-',
                'transportation'  => 'Pesawat',
                'notes'           => '-',
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => 'Booking berhasil dibuat',
                'data'    => $transaction
            ], 201);

        } catch (\Exception $e) {
            // ... error handling biarkan sama ...
            return response()->json([
                'status'  => 'error',
                'message' => 'Gagal menyimpan data ke database',
                'debug'   => $e->getMessage()
            ], 500);
        }
    }
}