<?php

namespace Tests\Traits;

use Domain\Users\User;

trait CreateUser
{
    /**
     * User model.
     *
     * @var Domain\Users\User
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
