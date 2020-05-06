<?php

namespace Domain\Users\Actions;

use Domain\Users\User;
use Support\Contracts\Actionable;

class UpdatePasswordAction implements Actionable
{
    public function run(User $user, string $new_password): User
    {
        $user->update([
            'password' => $new_password,
        ]);

        return $user;
    }
}
