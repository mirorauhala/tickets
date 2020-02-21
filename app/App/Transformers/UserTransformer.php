<?php

namespace App\Transformers;

use Domain\Users\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id'          => $user->id,
            'first_name'  => $user->first_name,
            'last_name'   => $user->last_name,
            'full_name'   => $user->full_name(),
            'email'       => $user->email,
            'postal_code' => $user->postal_code,
        ];
    }
}
