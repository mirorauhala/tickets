<?php

namespace Tikematic\Http\Controllers\Event;

use Tikematic\Models\Event;
use Illuminate\Http\Request;
use Tikematic\Http\Controllers\Controller;

class TournamentController extends Controller
{
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
