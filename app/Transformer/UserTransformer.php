<?php

namespace App\Transformer;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $query)
    {
        return [
            'id_user' => $query->id_user,
            'nip' => $query->nip,
            'nama' => $query->nama,
            'email' => $query->email,
            'jenis_kelamin' => $query->jenis_kelamin,
            'no_hp' => $query->no_hp,
            'alamat' => $query->alamat,
        ];
    }
}
