<?php

namespace App\Rules;

use Domain\Seats\Seat;
use Domain\Tickets\Ticket;
use Domain\OrderItems\OrderItem;
use Illuminate\Contracts\Validation\Rule;

class CheckTicketReservation implements Rule
{
    protected $ticket;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->ticket = Ticket::findOrFail($id);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // if ticket is seatable
        // NEEDS REWORK DUE TO is_seatable BEING DROPPED OFF
        if ($this->ticket->is_seatable == true) {
            // number of seats in total for same ticket type
            $seats = Seat::ticketType($this->ticket->id)->count();

            // number of paidOrPending orders
            $orders = OrderItem::paidOrPending()->ticketType($this->ticket->id)->count();

            // maximum amount of tickets that can be sold
            $maxOrderItems = $seats - $value;

            // maximum amount of order items that can be paidOrPending
            // but the requested order can still continue
            if ($orders > $maxOrderItems) {
                return false;
            }
        } elseif ($this->ticket->reserved > 0) {
            // get amount of paidOrLocked tickets
            $paidOrPendingTickets = OrderItem::paidOrPending()->ticketType($this->ticket->id)->count();

            // maximum amount of tickets that can be reserved but the
            // requested order can still continue
            $maxTicketsReserved = $this->ticket->reserved - $value;

            // check that there are enough tickets left for the order to continue
            if ($paidOrPendingTickets > $maxTicketsReserved) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Not enough tickets left!';
    }
}
