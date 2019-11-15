<?php

namespace Domain\User\Actions;

use Domain\User\User;
use Domain\User\UserData;

class UpdateUserAction {
    public function run(User $user, UserData $data) {
        return $user->update([
            'first_name' => $data->first_name ?? null,
            'last_name'  => $data->last_name ?? null,
            'email'      => $data->email ?? null,
            'phone'      => $data->phone ?? null,
        ]);
    }
}
