<?php

namespace Domain\Events\Actions;

use Domain\Events\Event;
use Support\Contracts\Actionable;

class GetFeaturedEvents implements Actionable
{
    public function run()
    {
        return Event::featured()->get();
    }
}
