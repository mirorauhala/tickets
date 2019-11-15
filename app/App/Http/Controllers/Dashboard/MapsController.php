<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Map;
use App\Models\Event;
use App\Http\Requests\MapRequest;
use App\Http\Controllers\Controller;

class MapsController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show listing of maps.
     *
     * @param Event $event
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Event $event)
    {
        $this->authorize('update', $event);

        return view('dashboard.maps.index')
            ->with([
                'event' => $event,
                'maps'  => $event->maps,
            ]);
    }

    /**
     * Map creating view.
     *
     * @param App\Models\Event $event
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(Event $event)
    {
        $this->authorize('update', $event);

        return view('dashboard.maps.create')
            ->with([
                'event'  => $event,
            ]);
    }

    /**
     * Storing a map.
     *
     * @param App\Models\Event $event
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Event $event, MapRequest $request)
    {
        $this->authorize('update', $event);

        $map = $event->maps()->create([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('dashboard.maps.show', ['event' => $event, 'map' => $map])
            ->with([
                'flash_status'  => 'success',
                'flash_message' => 'Map created.',
            ]);
    }

    /**
     * Show a map.
     *
     * @param App\Models\Event $event
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Event $event, Map $map)
    {
        $this->authorize('update', $event);

        return view('dashboard.maps.edit')
            ->with([
                'event' => $event,
                'map'   => $map,
            ]);
    }

    /**
     * Edit a map.
     *
     * @param App\Models\Event $event
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Event $event, Map $map)
    {
        $this->authorize('update', $event);

        return view('dashboard.maps.edit')
            ->with([
                'event' => $event,
                'map'   => $map,
            ]);
    }

    /**
     * Update a map.
     *
     * @param App\Models\Event $event
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Event $event, Map $map, MapRequest $request)
    {
        $this->authorize('update', $event);

        $map->update([
            'name'   => $request->name,
            'active' => optional($request)->active ? true : false,
        ]);

        return redirect()
            ->route('dashboard.maps.edit', ['event' => $event, 'map' => $map])
            ->with([
                'flash_status'  => 'success',
                'flash_message' => 'Map updated.',
            ]);
    }

    /**
     * Destroy the map.
     *
     * @param App\Models\Event $event
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Event $event, Map $map)
    {
        $this->authorize('update', $event);

        $map->delete();

        return redirect()
            ->route('dashboard.maps.index', ['event' => $event])
            ->with([
                'flash_status'  => 'success',
                'flash_message' => 'Map deleted.',
            ]);
    }
}
