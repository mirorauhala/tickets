<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Event;
use App\Http\Controllers\Controller;

class MapsController extends Controller
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
     * Show listing of maps.
     *
     * @param App\Models\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event)
    {
        $this->authorize('update', $event);

        return view('dashboard.maps')
            ->with([
                'event' => $event,
                'maps'  => $event->maps,
            ]);
    }

    /**
     * Map creating view.
     *
     * @param App\Models\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {
        $this->authorize('update', $event);

        return view('dashboard.map-create')
            ->with([
                'event'  => $event,
            ]);
    }

    /**
     * Storing a map.
     *
     * @param App\Models\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Event $event, MapRequest $request)
    {
        $this->authorize('update', $event);

        $map = $event->maps()->create([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('dashboard.maps', ['event' => $event, 'map' => $map]);
    }
}
