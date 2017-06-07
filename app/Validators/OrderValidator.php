<?php

namespace Tikematic\Validators;

use Tikematic\Models\{Ticket, Order};

class OrderValidator {
    /**
    * Validate ticket availability at this time
    **/
    public function validateTicketAvailabilityAtThisTime($attribute, $value, $parameters, $validator) {
        return (Ticket::where('id', $value)->availableAtThisTime()->count() > 0) ? true : false;
    }
}
