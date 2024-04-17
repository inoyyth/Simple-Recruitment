<?php
namespace App\Transformer;

use League\Fractal\TransformerAbstract;
use App\Models\Peserta;

class PesertaTransformer extends TransformerAbstract
{
    public function transform(Peserta $query)
    {
        return [
            'id_peserta' => $query->id_peserta,
            'id_pelamar' => $query->id_pelamar,
            'id_jadwal' => $query->id_jadwal,
            'gelombang' => $query->gelombang,
        ];
    }
}