<?php

namespace Domain\User\ViewModels;

use Domain\User\User;
use Illuminate\Contracts\Support\Arrayable;
use Spatie\DataTransferObject\DataTransferObject;

class LanguageViewModel extends DataTransferObject implements Arrayable {
    public function __construct(User $user, string $current_language) {
        $this->user = $user;
        $this->current_language = $current_language;
    }

    public function languages() {
        return [
            'none' => tra('language.automatic'),
            'fi' => tra('language.english'),
            'en' => tra('language.finnish')
        ];
    }
}
