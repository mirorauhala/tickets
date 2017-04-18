<?php

namespace Tikematic\Http\Controllers\EventAdmin;

use Tikematic\Event;
use Illuminate\Http\Request;
use Tikematic\Http\Controllers\Controller;

class TicketController extends Controller
{
    /**
     * Show the event tournaments.
     *
     * @return \Illuminate\Http\Response
     */
    public function tickets()
    {
        // do ugly hard code for event ID
        $event = Event::with('tickets')->findOrFail(1);

        return view('events.admin.tickets')
            ->with([
                "event" => $event,
                "tickets" => $event->tickets()->paginate(15),
            ]);
    }

}
