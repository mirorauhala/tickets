<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Event;
use Illuminate\Support\Facades\Cache;

class EventController extends Controller
{
    /**
     * Show featured events.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::featured()->get();

        return view('events.featured')
            ->with([
                'events' => $events,
            ]);
    }

    /**
     * Show all events.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $events = Event::paginate(15)->all();

        return view('events.all')
            ->with([
                'events' => $events,
            ]);
    }

    /**
     * Show event page.
     *
     * @param App\Models\Event
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        // $seats = Cache::remember('event.{$event->slug}.seats', 2, function () {
        //     return Seat::with('orderItem')->get();
        // });

        $seats = Seat::with('orderItem')->get();

        $tickets = Cache::remember('event.{$event->slug}.tickets', 2, function () use ($event) {
            return $event->tickets()->purchasable()->orderByPrice()->get();
        });

        return view('events.view')
            ->with([
                'event'   => $event,
                'tickets' => $tickets,
                'seats'   => $seats,
            ]);
    }
}
