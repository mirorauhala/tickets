<?php

namespace Domain\User\Actions;

use Domain\User\User;

class UpdateLanguageAction {
    public function run(User $user, string $language): User {
        $user->update([
            'language' => $language,
        ]);

        return $user;
    }
}
