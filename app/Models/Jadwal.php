<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';

    protected $fillable = [
        'tanggal_pemanggilan',
        'waktu_pemanggilan',
        'lokasi',
        'ruang',
    ];
}