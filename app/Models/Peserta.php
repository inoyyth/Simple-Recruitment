<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peserta extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'peserta';
    protected $primaryKey = 'id_peserta';

    protected $fillable = [
        'id_pelamar',
        'id_jadwal',
        'gelombang',
    ];

    public function pelamar(): HasOne
    {
        return $this->hasOne(Pelamar::class, 'id_pelamar', 'id_pelamar');
    }

    public function jadwal(): HasOne
    {
        return $this->hasOne(Jadwal::class, 'id_jadwal', 'id_jadwal');
    }
}
