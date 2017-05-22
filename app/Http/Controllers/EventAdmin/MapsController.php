<?php

namespace Tikematic\Http\Controllers\EventAdmin;

use Tikematic\Models\Event;
use Illuminate\Http\Request;
use Tikematic\Http\Controllers\Controller;

class MapsController extends Controller
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
     * Show the event tournaments.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewEventTickets()
    {
        // do ugly hard code for event ID
        $event = Event::with('tickets')->findOrFail(1);

        // restrict access to authorized users only
        $this->authorize('update', $event);

        return view('events.admin.tickets.list')
            ->with([
                "event" => $event,
                "tickets" => $event->tickets()->paginate(15),
            ]);
    }

    /**
     * Show view to create new tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewEventNewTicket()
    {
        // do ugly hard code for event ID
        $event = Event::with('tickets')->findOrFail(1);

        // restrict access to authorized users only
        $this->authorize('update', $event);

        return view('events.admin.tickets.new')
            ->with([
                "event" => $event,
                "tickets" => $event->tickets()->paginate(15),
            ]);
    }

    /**
     * Show the view to edit tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewEventEditTicket()
    {
        // do ugly hard code for event ID
        $event = Event::with('tickets')->findOrFail(1);

        // restrict access to authorized users only
        $this->authorize('update', $event);

        return view('events.admin.tickets.edit')
            ->with([
                "event" => $event,
                "tickets" => $event->tickets()->paginate(15),
            ]);
    }

    /**
     * Show the view to confirm ticket deletion.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewEventDeleteTicket()
    {
        // do ugly hard code for event ID
        $event = Event::with('tickets')->findOrFail(1);

        // restrict access to authorized users only
        $this->authorize('update', $event);

        return view('events.admin.tickets.delete')
            ->with([
                "event" => $event,
                "tickets" => $event->tickets()->paginate(15),
            ]);
    }

    /**
     * Process the deletion of a ticket.
     *
     * @return \Illuminate\Http\Response
     */
    public function processEventTicketDelete()
    {
        // do ugly hard code for event ID
        $event = Event::with('tickets')->findOrFail(1);

        // restrict access to authorized users only
        $this->authorize('update', $event);

        return view('events.admin.tickets.list')
            ->with([
                "event" => $event,
                "tickets" => $event->tickets()->paginate(15),
                "flash_status" => 200,
                "flash_message" => "Ticket has been deleted.",
            ]);
    }

}