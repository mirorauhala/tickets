<?php

namespace Domain\Dashboard\Controllers;

use Domain\Events\Event;
use App\Http\Requests\EventRequest;
use App\Http\Controllers\Controller;

class DashboardEventController extends Controller
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
     * @param Domain\Events\Event $event
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
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
     * @param Domain\Events\Event $event
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Event $event, EventRequest $request)
    {
        $this->authorize('update', $event);

        $event->update($request->validated());

        return redirect()
            ->route('dashboard.settings', ['event' => $event])
            ->with([
                'flash_status'  => 200,
                'flash_message' => 'Event updated.',
            ]);
    }
}
