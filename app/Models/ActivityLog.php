<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'action',      // <--- PENTING: Agar error 'action' hilang
        'description',
        'ip_address',  // Opsional: hapus jika error "Column not found"
        'user_agent',  // Opsional: hapus jika error "Column not found"
    ];
}