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
            'name'                    => $request->name,
            'price'                   => $request->price,
            'vat'                     => $request->vat,
            'reserved'                => $request->reserved,
            'maxAmountPerTransaction' => $request->maxAmountPerTransaction,
            'availableAt'             => $request->availableAt,
            'unavailableAt'           => $request->unavailableAt,
            'is_seatable'             => $request->is_seatable,
        ]);

        return redirect()
            ->route('dashboard.map', ['event' => $event, 'map' => $map]);
    }
}
