<?php

namespace Tikematic\Repositories\Eloquent;

use Auth;

use Tikematic\Models\User;
use Tikematic\Repositories\RepositoryAbstract;
use Tikematic\Repositories\Contracts\UserRepository;

class EloquentUserRepository extends RepositoryAbstract implements UserRepository
{
    public function entity()
    {
        return User::class;
    }

    /*
    * Returns the user model that is authenticated.
    *
    * @returns \Tikematic\Models\User
    */
    public function authenticated()
    {
        return Auth::user();
    }
}
