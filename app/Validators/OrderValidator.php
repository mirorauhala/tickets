<?php

namespace Tikematic\Validators;

use Tikematic\Repositories\Contracts\{
    TicketRepository,
    SeatRepository,
    OrderItemRepository
};

use Tikematic\Repositories\Eloquent\Criteria\{
    TicketsAvailable,
    SeatsAvailable
};

class OrderValidator
{
    protected $ticket;
    protected $seat;
    protected $orderItem;

    public function __construct(TicketRepository $ticket, SeatRepository $seat, OrderItemRepository $orderItem)
    {
        $this->ticket = $ticket;
        $this->seat = $seat;
        $this->orderItem = $orderItem;
    }

    /**
    * Validate ticket availability
    **/
    public function validateTicketAvailabilityAtThisTime($attribute, $value)
    {
        return $this->ticket->isPurchasable($value);
    }

    /**
    * Validate seat availability
    **/
    public function validateSeatAvailability($attribute, $value)
    {
        return $this->seat->isAvailable($value);
    }

    /**
    * Validate seat availability
    **/
    public function validateOrderItemStatusAndSeatAvailability($attribute, $value)
    {
        return $this->orderItem->seatSelectable($value);
    }
}
