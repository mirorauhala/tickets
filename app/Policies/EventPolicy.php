<?php

namespace Tikematic\Policies;

use Tikematic\Models\User;
use Tikematic\Models\Event;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the event admin page.
     *
     * @param  \Tikematic\User  $user
     * @param  \Tikematic\Event  $event
     * @return mixed
     */
    public function view(User $user, Event $event)
    {
        return true;
    }

    /**
     * Determine whether the user can create events.
     *
     * @param  \Tikematic\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->superuser == 1;
    }

    /**
     * Determine whether the user can update the event.
     *
     * @param  \Tikematic\User  $user
     * @param  \Tikematic\Event  $event
     * @return mixed
     */
    public function update(User $user, Event $event)
    {
        return $user->events()->where('event_id', $event->id)->first();
    }

    /**
     * Determine whether the user can delete the event.
     *
     * @param  \Tikematic\User  $user
     * @param  \Tikematic\Event  $event
     * @return mixed
     */
    public function delete(User $user, Event $event)
    {
        return $user->events()->where('event_id', $event->id)->first();
    }
}
