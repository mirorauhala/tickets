<?php

namespace Domain\Users\Actions;

use Domain\Users\User;
use Domain\Users\UserData;

class UpdateUserAction
{
    public function run(User $user, UserData $data)
    {
        $user->update([
            'first_name' => $data->first_name,
            'last_name'  => $data->last_name,
            'email'      => $data->email,
            'phone'      => $data->phone ?? null,
        ]);
    }
}
