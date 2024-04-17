<?php
namespace App\Transformer;

use League\Fractal\TransformerAbstract;
use App\Models\Pelamar;

class PelamarTransformer extends TransformerAbstract
{
    public function transform(Pelamar $query)
    {
        return [
            'id_pelamar' => $query->id_pelamar,
            'nama_pelamar' => $query->nama_pelamar,
            'no_ktp' => $query->no_ktp,
            'alamat' => $query->alamat,
            'email' => $query->email,
            'no_hp' => $query->no_hp,
        ];
    }
}