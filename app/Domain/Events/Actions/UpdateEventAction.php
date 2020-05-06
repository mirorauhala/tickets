<?php

namespace Domain\Events\Actions;

use Domain\Events\Event;
use Domain\Events\EventData;

class UpdateEventAction
{
    public function run(Event $event, EventData $data)
    {
        $event->update($data->all());
    }
}
