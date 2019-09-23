<?php

namespace App\Repositories\Eloquent;

use Auth;
use App\Models\User;
use App\Repositories\RepositoryAbstract;
use App\Repositories\Contracts\UserRepository;

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
