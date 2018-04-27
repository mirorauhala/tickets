<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\RepositoryAbstract;
use Auth;

class EloquentUserRepository extends RepositoryAbstract implements UserRepository
{
    public function entity()
    {
        return User::class;
    }

    /*
    * Returns the user model that is authenticated.
    *
    * @returns \App\Models\User
    */
    public function authenticated()
    {
        return Auth::user();
    }
}
