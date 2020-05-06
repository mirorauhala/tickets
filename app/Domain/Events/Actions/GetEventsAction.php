<?php

namespace Domain\Events\Actions;

use Domain\Events\Event;
use Support\Contracts\Actionable;
use Domain\Events\Collections\EventCollection;

class GetEventsAction implements Actionable
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
