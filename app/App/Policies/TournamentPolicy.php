<?php

namespace App\Policies;

use Domain\Users\User;
use App\Models\Tournament;
use Illuminate\Auth\Access\HandlesAuthorization;

class TournamentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any app models tournaments.
     *
     * @param  \Domain\Users\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the app models tournament.
     *
     * @param  \Domain\Users\User  $user
     * @param  \App\Models\Tournament  $tournament
     * @return mixed
     */
    public function view(User $user, Tournament $tournament)
    {
        //
    }

    /**
     * Determine whether the user can create app models tournaments.
     *
     * @param  \Domain\Users\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the app models tournament.
     *
     * @param  \Domain\Users\User  $user
     * @param  \App\Models\Tournament  $tournament
     * @return mixed
     */
    public function update(User $user, Tournament $tournament)
    {
        //
    }

    /**
     * Determine whether the user can delete the app models tournament.
     *
     * @param  \Domain\Users\User  $user
     * @param  \App\Models\Tournament  $tournament
     * @return mixed
     */
    public function delete(User $user, Tournament $tournament)
    {
        return $tournament->event->users->contains($user);
    }

    /**
     * Determine whether the user can restore the app models tournament.
     *
     * @param  \Domain\Users\User  $user
     * @param  \App\Models\Tournament  $tournament
     * @return mixed
     */
    public function restore(User $user, Tournament $tournament)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the app models tournament.
     *
     * @param  \Domain\Users\User  $user
     * @param  \App\Models\Tournament  $tournament
     * @return mixed
     */
    public function forceDelete(User $user, Tournament $tournament)
    {
        //
    }
}
