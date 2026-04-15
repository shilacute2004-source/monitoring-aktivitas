<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'berat_badan',
        'umur',
        'jenis_kelamin',
        'jenis_aktivitas',
        'denyut_jantung',
        'kalori_terbakar',
        'durasi'
    ];
}