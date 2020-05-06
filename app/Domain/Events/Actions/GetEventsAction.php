<?php

namespace Domain\Events\Actions;

use Domain\Events\Event;
use Domain\Events\Collections\EventCollection;

class GetEventsAction
{

    /**
     * Return paginated collection of events.
     *
     * @return Domain\Events\Collections\EventCollection
     */
    public function run() : array
    {
        return Event::paginate(15)->all();
    }
}
