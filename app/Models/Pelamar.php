<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    use HasFactory;
    protected $table = 'pelamar';
    protected $primarykey = 'id_pelamar';

    protected $fillable = [
        'no_ktp',
        'nama_pelamar',
        'tanggal_lahir',
        'alamat',
        'email',
        'no_hp',
        'jenis_kelamin',
        'foto',
        'password',
    ];

}