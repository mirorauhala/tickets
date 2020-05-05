<?php

namespace Domain\Events\Controllers;

use Domain\Seats\Seat;
use Domain\Events\Event;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Domain\Events\Actions\GetEventsAction;
use Domain\Events\ViewModels\EventIndexViewModel;

class EventController extends Controller
{
    /**
     * Return all events paginated.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetEventsAction $action)
    {
        $events = $action->run();
        $viewModel = new EventIndexViewModel($events);

        return view('events.index', $viewModel);
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
        // $seats = Cache::remember('event.{$event->slug}.seats', 2, function () {
        //     return Seat::with('orderItem')->get();
        // });

        $seats = Seat::with('orderItem')->get();

        $tickets = Cache::remember('event.{$event->slug}.tickets', 2, function () use ($event) {
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
