<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Event;
use App\Models\Ticket;

class EventController extends Controller
{
    /**
     * Show the application dashboard.
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
        return view('events.index')
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

        return view('events.ticket')
            ->with([
                'event'  => $event,
                'ticket' => $ticket,
            ]);
    }

    /**
     * Show specific map for the event.
     *
     * @return \Illuminate\Http\Response
     */
    public function map()
    {
        // do ugly hard code for event ID
        $event = Event::findOrFail(1);

        $seats = Seat::with('orderItem')->get();

        return view('events.map')
            ->with([
                'event' => $event,
                'seats' => $seats,
            ]);
    }
}
