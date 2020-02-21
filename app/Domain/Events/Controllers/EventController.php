<?php

namespace Domain\Event\Controllers;

use App\Models\Seat;
use Domain\Events\Event;
use Illuminate\Support\Facades\Cache;

class EventController extends Controller
{
    /**
     * Return all events paginated.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EventIndexViewModel $viewModel)
    {
        $events = Event::paginate(15)->all();

        return view('events.index')
            ->with([
                'events' => $events,
            ]);
    }

    /**
     * Show event page.
     *
     * @param Domain\Events\Event
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        // $seats = Cache::remember('event.{$event->getRouteKey()}.seats', 2, function () {
        //     return Seat::with('orderItem')->get();
        // });

        $seats = Seat::with('orderItem')->get();

        $tickets = Cache::remember('event.{$event->getRouteKey()}.tickets', 2, function () use ($event) {
            return $event->tickets()->purchasable()->orderByPrice()->get();
        });

        return view('events.show')
            ->with([
                'event'   => $event,
                'tickets' => $tickets,
                'seats'   => $seats,
            ]);
    }
}
