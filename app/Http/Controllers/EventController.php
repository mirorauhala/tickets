<?php

namespace Tikematic\Http\Controllers;

use Tikematic\Event;
use Illuminate\Http\Request;

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

        return view('events.details')
            ->with([
                "event" => $event,
            ]);
    }

    /**
     * Show event maps.
     *
     * @return \Illuminate\Http\Response
     */
    public function maps()
    {

        // do ugly hard code for event ID
        $event = Event::findOrFail(1);

        return view('events.maps')
            ->with([
                "event" => $event,
            ]);
    }

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
                "tickets" => $event->tickets,
            ]);
    }

    /**
     * Show event tournaments.
     *
     * @return \Illuminate\Http\Response
     */
    public function tournaments()
    {

        // do ugly hard code for event ID
        $event = Event::findOrFail(1);

        return view('events.tournaments')
            ->with([
                "event" => $event,
            ]);
    }
}
