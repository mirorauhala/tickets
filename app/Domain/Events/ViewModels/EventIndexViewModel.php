<?php

namespace Domain\Event\ViewModels;

class EventIndexViewModel {

    public function __construct(EventCollection $events) {
        $this->events = $events;
    }
}
