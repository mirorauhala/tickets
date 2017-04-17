<?php

namespace Tikematic\Http\Controllers\EventAdmin;

use Tikematic\Event;
use Illuminate\Http\Request;
use Tikematic\Http\Controllers\Controller;

class TournamentController extends Controller
{
    /**
     * Show the event tournaments.
     *
     * @return \Illuminate\Http\Response
     */
    public function tournaments()
    {
        // do ugly hard code for event ID
        $event = Event::with('customers')->findOrFail(1);

        return view('events.admin.tournaments')
            ->with([
                "event" => $event,
                "tournaments" => $event->tournaments()->paginate(15),
            ]);
    }

}
