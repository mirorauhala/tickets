<?php

namespace Domain\Users\ViewModels;

use Domain\Users\User;
use Illuminate\Contracts\Support\Arrayable;

class LanguageViewModel implements Arrayable
{

    /**
     * List of supported languages.
     *
     * @var array
     */
    public $languages = [
        'none',
        'fi',
        'en'
    ];

    public function __construct(User $user, string $current_language)
    {
        $this->user = $user;
        $this->current_language = $current_language;
    }

    public function toArray()
    {
        return \get_object_vars($this);
    }
}
