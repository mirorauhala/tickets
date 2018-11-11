<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Event;
use App\Http\Requests\EventRequest;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display event settings.
     *
     * @param App\Models\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $this->authorize('update', $event);

        return view('dashboard.settings')
            ->with([
                'event' => $event,
            ]);
    }

    /**
     * Store event settings.
     *
     * @param App\Models\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Event $event, EventRequest $request)
    {
        $this->authorize('update', $event);

        $event->update([
            'name'        => $request->name,
            'slug'        => $request->slug,
            'location'    => $request->location,
            'url'         => $request->url,
            'currency'    => $request->currency,
        ]);

        return redirect()
            ->route('dashboard.settings', ['event' => $event])
            ->with([
                'flash_status'  => 200,
                'flash_message' => 'Event updated.',
            ]);
    }
}
