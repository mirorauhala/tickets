<?php

namespace Tikematic\Http\Controllers\EventAdmin;

use Tikematic\Models\Event;
use Illuminate\Http\Request;
use Tikematic\Http\Controllers\Controller;

class SettingsController extends Controller
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
     * Show the event settings view.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewEventSettings()
    {


        // do ugly hard code for event ID
        $event = Event::findOrFail(1);

        // restrict access to authorized users only
        $this->authorize('update', $event);

        return view('events.admin.settings')
            ->with([
                "event" => $event,
            ]);
    }

}
