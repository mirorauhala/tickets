<?php

namespace Domain\Events\Actions;

use Domain\Events\Event;

class GetEventsAction
{
    /**
     * Return paginated collection of events.
     *
     * @return Illuminate\Database\Eloquent
     */
    public function run() : array
    {
        return Event::paginate(15)->all();
    }
}
