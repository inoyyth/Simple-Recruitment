<?php
namespace App\Transformer;

use League\Fractal\TransformerAbstract;
use App\Models\PicJadwal;

class PicJadwalTransformer extends TransformerAbstract
{
    public function transform(PicJadwal $query)
    {
        return [
            'id' => $query->id_pic_jadwal,
            'id_user' => $query->id_user,
            'user_nama' => isset($query->user) ? $query->user->nama : '',
            'id_jadwal' => $query->id_jadwal,
            'id_role' => $query->id_role,
            'role_title' => $query->role->title
        ];
    }
}