<?php

namespace Tikematic\Validators;

use Tikematic\Ticket;

class OrderValidator {
    public function validateTicketTypeAndAvailablility($attribute, $value, $parameters, $validator) {
        return Ticket::where("id", $value)->available()->get();
    }
}
