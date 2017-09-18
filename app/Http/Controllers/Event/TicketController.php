<?php

namespace Tikematic\Http\Controllers\Event;

use Tikematic\Models\Event;
use Illuminate\Http\Request;
use Tikematic\Http\Controllers\Controller;
use Tikematic\Repositories\Contracts\TicketRepository;
use Tikematic\Repositories\Eloquent\Criteria\{
    EagerLoad,
    TicketsAvailable,
    TicketsCheapestFirst
};

class TicketController extends Controller
{
    protected $tickets;

    public function __construct(TicketRepository $tickets)
    {
        $this->tickets = $tickets;
    }

    /**
     * Show event tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTickets()
    {
        // do ugly hard code for event ID
        $event = Event::findOrFail(1);

        // get all tickets
        $tickets = $this->tickets->withCriteria(
            new TicketsAvailable(),
            new TicketsCheapestFirst(),
            new EagerLoad(['event'])
        )->all();

        // return event and tickets
        return view('events.tickets.main')
            ->with([
                "event" => $event,
                "tickets" => $tickets,
            ]);
    }

    /**
     * Show one ticket type.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTicket(Ticket $ticket)
    {
        // do ugly hard code for event ID
        $event = Event::findOrFail(1);

        return view('events.tickets.ticket')
            ->with([
                "event" => $event,
                "ticket" => $ticket,
            ]);
    }
}
