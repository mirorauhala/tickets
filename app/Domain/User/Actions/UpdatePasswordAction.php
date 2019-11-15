<?php

namespace Domain\User\Actions;

use Domain\User\User;

class UpdatePasswordAction {
    public function run(User $user, string $new_password): User {
        $user->update([
            'password' => $new_password,
        ]);

        return $user;
    }
}
