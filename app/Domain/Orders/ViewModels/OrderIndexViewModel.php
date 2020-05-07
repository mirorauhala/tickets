<?php

namespace Domain\Orders\ViewModels;

use Support\BaseViewModel as ViewModel;

class OrderIndexViewModel extends ViewModel
{
    /**
     * @var \Traversable
     */
    protected $orders;

    /**
     * Build view model for Event index.
     *
     * @param Traversable $orders A traversable collection of orders.
     * @return void
     */
    public function __construct(\Traversable $orders)
    {
        $this->orders = $orders;
    }
}
