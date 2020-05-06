<?php

namespace Domain\Events\Actions;

use Domain\Events\Event;

class GetFeaturedEvents
{
    public function run()
    {
        return Event::featured()->get();
    }
}
