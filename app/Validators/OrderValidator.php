<?php

namespace Tikematic\Validators;

use Tikematic\Models\{Ticket, Seat, OrderItem};

class OrderValidator {
    /**
    * Validate ticket availability at this time
    **/
    public function validateTicketAvailabilityAtThisTime($attribute, $value, $parameters, $validator) {
        return (Ticket::where('id', $value)->availableAtThisTime()->count() > 0) ? true : false;
    }
    /**
    * Validate seat availability
    **/
    public function validateSeatAvailability($attribute, $value, $parameters, $validator) {
        return (Seat::where('id', $value)->available()->count() > 0) ? true : false;
    }
    /**
    * Validate seat availability
    **/
    public function validateOrderItemSeatAvailability($attribute, $value, $parameters, $validator) {
        return (OrderItem::where('id', $value)->emptySeat()->count() > 0) ? true : false;
    }
}
