<?php

namespace Tikematic\Http\Controllers\Event;

use Auth;
use Carbon\Carbon;
use Tikematic\Models\{Event, Ticket, Seat};
use Illuminate\Http\Request;
use Tikematic\Http\Controllers\Controller;
use Tikematic\Http\Requests\VisitorTicketRequest;
use Illuminate\Contracts\Validation\Validator;

class TicketController extends Controller
{
    /**
     * Show event tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTickets()
    {
        // do ugly hard code for event ID
        $event = Event::findOrFail(1);

        return view('events.tickets.main')
            ->with([
                "event" => $event,
                "tickets" => $event->tickets()->availableAtThisTime()->orderBy("price", "asc")->get(),
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

    /**
     * Show visitor ticket view.
     *
     * @return \Illuminate\Http\Response
     */
    public function showVisitorTicket()
    {
        // do ugly hard code for event ID
        $event = Event::findOrFail(1);

        return view('events.tickets.visitor')
            ->with([
                "event" => $event,
                "ticket" => $event->tickets()->availableAtThisTime()->visitorTicket()->first(),
            ]);
    }

    /**
     * Show gamer ticket view.
     *
     * @return \Illuminate\Http\Response
     */
    public function showGamerTickets()
    {
        // do ugly hard code for event ID
        $event = Event::findOrFail(1);

        return view('events.tickets.gamer')
            ->with([
                "event" => $event,
                "ticket" => $event->tickets()->availableAtThisTime()->gamerTickets()->get(),
                "seats" => Seat::all(),
            ]);
    }
}
