<?php

namespace Domain\Events\Policies;

use Domain\Users\User;
use Domain\Events\Event;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the event admin page.
     *
     * @param Domain\Users\User  $user
     * @param Domain\Events\Event $event
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
     * @param Domain\Users\User $user
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
     * @param Domain\Users\User  $user
     * @param Domain\Events\Event $event
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
     * @param Domain\Users\User  $user
     * @param Domain\Events\Event $event
     *
     * @return bool
     */
    public function delete(User $user, Event $event)
    {
        return $user->events()->where('event_id', $event->id)->exists();
    }
}
