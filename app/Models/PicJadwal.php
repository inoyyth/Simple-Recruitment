<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PicJadwal extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pic_jadwal';
    protected $primaryKey = 'id_pic_jadwal';

    protected $fillable = [
        'id_user',
        'id_jadwal',
        'id_role',
    ];
}
