<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_phone',
        'package_name',
        'passenger_count',
        'start_date',
        'end_date',
        'transportation',
        'use_guide',
        'notes',
        'total_price',
        'status',
    ];
}