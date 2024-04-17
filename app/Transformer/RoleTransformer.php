<?php

namespace App\Transformer;

use App\Models\Role;
use League\Fractal\TransformerAbstract;

class RoleTransformer extends TransformerAbstract
{
    public function transform(Role $query)
    {
        return [
            'id_role' => $query->id_role,
            'title' => $query->title,
        ];
    }
}
