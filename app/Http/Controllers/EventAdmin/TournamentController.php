<?php

namespace Tikematic\Http\Controllers\EventAdmin;

use Tikematic\Models\Event;
use Illuminate\Http\Request;
use Tikematic\Http\Controllers\Controller;

class TournamentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the event tournaments.
     *
     * @return \Illuminate\Http\Response
     */
    public function tournaments()
    {
        // do ugly hard code for event ID
        $event = Event::with('customers')->findOrFail(1);

        // restrict access to authorized users only
        $this->authorize('update', $event);

        return view('events.admin.tournaments')
            ->with([
                "event" => $event,
                "tournaments" => $event->tournaments()->paginate(15),
            ]);
    }

}
