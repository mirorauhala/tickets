<?php

namespace Domain\Events\ViewModels;

use Support\BaseViewModel as ViewModel;
use Domain\Events\Collections\EventCollection;

class EventIndexViewModel extends ViewModel {
    /**
     * @var Domain\Events\Collections\EventCollection
     */
    protected $events;

    /**
     * Build view model for Event index.
     *
     * @return void
     */
    public function __construct(EventCollection $events) {
        $this->events = $events;
    }
}
