<?php

namespace Tikematic\Http\Controllers\Event;

use Tikematic\Models\Event;
use Illuminate\Http\Request;
use Tikematic\Http\Controllers\Controller;

class TicketController extends Controller
{
    /**
     * Show event tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function tickets()
    {
        // do ugly hard code for event ID
        $event = Event::findOrFail(1);

        return view('events.tickets')
            ->with([
                "event" => $event,
                "tickets" => $event->tickets()->available()->get(),
            ]);
    }
}
