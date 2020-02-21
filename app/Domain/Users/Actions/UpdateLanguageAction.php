<?php

namespace Domain\Users\Actions;

use Domain\Users\User;

class UpdateLanguageAction {
    public function run(User $user, string $language): User {
        $user->update([
            'language' => $language,
        ]);

        return $user;
    }
}
