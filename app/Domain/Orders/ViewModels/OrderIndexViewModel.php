<?php

namespace Domain\Orders\ViewModels;

use Support\BaseViewModel as ViewModel;
use Domain\Events\Collections\EventCollection;

class OrderIndexViewModel extends ViewModel {
    protected $orders;

    /**
     * Build view model for Event index.
     *
     * @return void
     */
    public function __construct($orders) {
        $this->orders = $orders;
    }
}
