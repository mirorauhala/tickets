<?php

namespace App\Http\Controllers\Event;

use App\Models\{Event, Seat};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
