<?php

namespace Tikematic\Http\Controllers;

use Tikematic\Event;
use Illuminate\Http\Request;

class EventAdminController extends Controller
{
    /**
     * Show the event customers.
     *
     * @return \Illuminate\Http\Response
     */
    public function customers()
    {
        // do ugly hard code for event ID
        $event = Event::findOrFail(1);

        return view('events.admin.customers')
            ->with([
                "event" => $event,
            ]);
    }

}
