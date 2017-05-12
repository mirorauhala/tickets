<?php

namespace Tikematic\Http\Controllers\Event;

use Tikematic\Map;
use Tikematic\Event;
use Illuminate\Http\Request;
use Tikematic\Http\Controllers\Controller;

class MapController extends Controller
{
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
                "maps" => $event->maps()->active()->get(),
            ]);
    }

    /**
     * Show specific map for the event.
     *
     * @return \Illuminate\Http\Response
     */
    public function map(Map $map)
    {

        // do ugly hard code for event ID
        $event = Event::findOrFail(1);

        $map->load('seats');

        return view('events.map')
            ->with([
                "event" => $event,
                "map" => $map,
                "seats" => $map->seats,
            ]);
    }
}
