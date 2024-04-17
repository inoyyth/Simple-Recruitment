<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelamar extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'pelamar';
    protected $primaryKey = 'id_pelamar';

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