<?php

namespace App\Validators;

use App\Repositories\Contracts\SeatRepository;
use App\Repositories\Contracts\OrderItemRepository;

class OrderValidator
{
    protected $seat;
    protected $orderItem;

    public function __construct(SeatRepository $seat, OrderItemRepository $orderItem)
    {
        $this->seat = $seat;
        $this->orderItem = $orderItem;
    }

    /**
     * Validate seat availability.
     **/
    public function validateSeatAvailability($attribute, $value)
    {
        return $this->seat->isAvailable($value);
    }

    /**
     * Validate seat availability.
     **/
    public function validateOrderItemStatusAndSeatAvailability($attribute, $value)
    {
        return $this->orderItem->seatSelectable($value);
    }
}
