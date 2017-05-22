<?php

namespace Tikematic\Http\Controllers\EventAdmin;

use Tikematic\Models\{Event, Ticket};
use Illuminate\Http\Request;
use Tikematic\Http\Controllers\Controller;
use Tikematic\Http\Requests\EventAdminTicketRequest;

class TicketController extends Controller
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
        $event = Event::findOrFail(1);

        // restrict access to authorized users only
        $this->authorize('update', $event);

        return view('events.admin.tickets.new')
            ->with([
                "event" => $event,
            ]);
    }

    /**
     * Process new tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function processEventNewTicket(EventAdminTicketRequest $request)
    {

        // do ugly hard code for event ID
        $event = Event::findOrFail(1);

        // restrict access to authorized users only
        $this->authorize('update', $event);

        $event->tickets()->create([
            "name"                  => $request->ticket_name,
            "price"                 => $request->ticket_price,
            "vat"                   => $request->ticket_vat,
            "reserved"              => $request->ticket_reserved,
            "max"                   => $request->ticket_max,
            "is_seatable"           => $request->ticket_seatable,
            "is_sleepable"          => $request->ticket_sleepable,
            "availableAt"           => $request->ticket_availableAt,
            "unavailableAt"         => $request->ticket_unavailableAt,
        ]);


        return view('events.admin.tickets.list')
            ->with([
                "event" => $event,
                "tickets" => $event->tickets()->paginate(15),
                "flash_status" => 200,
                "flash_message" => "Ticket created!",
            ]);
    }

    /**
     * Show the view to edit tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewEventEditTicket(Ticket $ticket)
    {
        // do ugly hard code for event ID
        $event = Event::with('tickets')->findOrFail(1);

        // restrict access to authorized users only
        $this->authorize('update', $event);

        return view('events.admin.tickets.edit')
            ->with([
                "event" => $event,
                "ticket" => $ticket,
            ]);
    }

    /**
     * Process ticket editing.
     *
     * @return \Illuminate\Http\Response
     */
    public function processEventEditTicket(Ticket $ticket, EventAdminTicketRequest $request)
    {
        // do ugly hard code for event ID
        $event = Event::findOrFail(1);

        // restrict access to authorized users only
        $this->authorize('update', $event);

        $ticket->name                          = $request->ticket_name;
        $ticket->price                         = $request->ticket_price;
        $ticket->vat                           = $request->ticket_vat;
        $ticket->reserved                      = $request->ticket_reserved;
        $ticket->maxAmountPerTransaction       = $request->ticket_max;
        $ticket->is_seatable                   = $request->ticket_seatable;
        $ticket->is_sleepable                  = $request->ticket_sleepable;
        $ticket->availableAt                   = $request->ticket_availableAt;
        $ticket->unavailableAt                 = $request->ticket_unavailableAt;
        $ticket->save();


        return view('events.admin.tickets.edit')
            ->with([
                "event" => $event,
                "ticket" => $ticket,
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
