<?php

namespace Tikematic\Http\Controllers\Event;

use Tikematic\Models\{Event, Seat};
use Illuminate\Http\Request;
use Tikematic\Http\Controllers\Controller;

class MapController extends Controller
{

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
                "event" => $event,
                "seats" => $seats,
            ]);
    }
}
