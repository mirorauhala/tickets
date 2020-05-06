<?php

namespace Domain\Events\Actions;

use Domain\Events\Event;
use Domain\Events\EventData;
use Support\Contracts\Actionable;

class UpdateEventAction implements Actionable
{
    public function run(Event $event, EventData $data)
    {
        $event->update($data->all());
    }
}
