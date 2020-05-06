<?php

namespace Domain\Events\ViewModels;

use Support\BaseViewModel as ViewModel;
use Domain\Events\Collections\EventCollection;

class EventIndexViewModel extends ViewModel
{
    protected $events;

    /**
     * Build view model for Event index.
     *
     * @return void
     */
    public function __construct($events)
    {
        $this->events = $events;
    }
}
