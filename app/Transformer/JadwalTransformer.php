<?php
namespace App\Transformer;

use League\Fractal\TransformerAbstract;
use App\Models\Jadwal;

class JadwalTransformer extends TransformerAbstract
{
    public function transform(Jadwal $query)
    {
        return [
            'id_jadwal' => $query->id_jadwal,
            'tanggal_pemanggilan' => $query->tanggal_pemanggilan,
            'waktu_pemanggilan' => $query->waktu_pemanggilan,
            'lokasi' => $query->lokasi,
            'ruang' => $query->ruang,
        ];
    }
}