<?php

namespace App\Http\Controllers\Event;

use App\Models\Event;
use App\Models\Ticket;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    /**
     * Show event tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // do ugly hard code for event ID
        $event = Event::findOrFail(1);

        // get all tickets
        $tickets = Ticket::with('event')->purchasable()->orderByPrice()->get();

        // return event and tickets
        return view('events.tickets.main')
            ->with([
                'event'   => $event,
                'tickets' => $tickets,
            ]);
    }

    /**
     * Show one ticket type.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        // do ugly hard code for event ID
        $event = Event::findOrFail(1);

        return view('events.tickets.ticket')
            ->with([
                'event'  => $event,
                'ticket' => $ticket,
            ]);
    }
}
