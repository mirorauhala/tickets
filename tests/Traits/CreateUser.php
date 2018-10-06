<?php

namespace Tests\Traits;

use App\Models\User;

trait CreateUser
{
    /**
     * User model.
     *
     * @var App\Models\User
     */
    protected $user;

    /**
     * Creates an user for testing purposes.
     *
     * @return void
     */
    protected function createUser()
    {
        $this->user = factory(User::class)->create();
    }
}
