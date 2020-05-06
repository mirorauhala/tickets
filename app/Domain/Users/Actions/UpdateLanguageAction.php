<?php

namespace Domain\Users\Actions;

use Domain\Users\User;
use Support\Contracts\Actionable;

class UpdateLanguageAction implements Actionable
{
    public function run(User $user, string $language): User
    {
        $user->update([
            'language' => $language,
        ]);

        return $user;
    }
}
