<?php

namespace App\Policies;

use Domain\User\User;
use App\Models\Event;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the event admin page.
     *
     * @param \App\User  $user
     * @param \App\Event $event
     *
     * @return bool
     */
    public function view(User $user, Event $event)
    {
        return $user->events()->where('event_id', $event->id)->exists();
    }

    /**
     * Determine whether the user can create events.
     *
     * @param \App\User $user
     *
     * @return bool
     */
    public function create(User $user)
    {
        return $user->superuser == 1;
    }

    /**
     * Determine whether the user can update the event.
     *
     * @param \App\User  $user
     * @param \App\Event $event
     *
     * @return bool
     */
    public function update(User $user, Event $event)
    {
        return $user->events()->where('event_id', $event->id)->exists();
    }

    /**
     * Determine whether the user can delete the event.
     *
     * @param \App\User  $user
     * @param \App\Event $event
     *
     * @return bool
     */
    public function delete(User $user, Event $event)
    {
        return $user->events()->where('event_id', $event->id)->exists();
    }
}
