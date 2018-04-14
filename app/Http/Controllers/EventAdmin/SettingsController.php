<?php

namespace App\Http\Controllers\EventAdmin;

use App\Models\Event;
use App\Http\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventAdminSettingsRequest;

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

    /**
     * Process the event's settings form.
     *
     * @return \Illuminate\Http\Response
     */
    public function processEventSettings(EventAdminSettingsRequest $request)
    {
        // do ugly hard code for event ID
        $event = Event::findOrFail(1);

        // restrict access to authorized users only
        $this->authorize('update', $event);

        $event->name = $request->event_name;
        $event->location = $request->event_location;
        $event->url = $request->event_url;
        //$event->currency = "EUR";
        $event->is_visible = $request->event_visibility;
        $event->save();

        return redirect()
            ->route('events.admin.settings')
            ->with([
                "event" => $event,
                "flash_status" => "success",
                "flash_message" => Helper::tra('event.admin.flash'),
            ]);
    }

}
