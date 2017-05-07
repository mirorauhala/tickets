<?php

namespace Tikematic\Http\Controllers\Event;

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
            ]);
    }
}
