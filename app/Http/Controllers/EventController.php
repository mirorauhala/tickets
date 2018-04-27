<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Seat;

class EventController extends Controller
{
    /**
     * Show featured events.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::featured()->get();

        // return event and tickets
        return view('featured')
            ->with([
                'events' => $events,
            ]);
    }

    /**
     * Show event page with tickets.
     *
     * @param App\Models\Event
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('events.index')
            ->with([
                'event'   => $event,
                'tickets' => $event->tickets()->purchasable()->orderByPrice()->get(),
            ]);
    }

    /**
     * Show specific map for the event.
     *
     * @return \Illuminate\Http\Response
     */
    public function map(Event $event)
    {
        $seats = Seat::with('orderItem')->get();

        return view('events.map')
            ->with([
                'event' => $event,
                'seats' => $seats,
            ]);
    }
}
