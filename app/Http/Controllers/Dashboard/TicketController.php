<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Event;
use App\Models\Ticket;
use App\Http\Controllers\Controller;
use App\Http\Requests\TicketRequest;

class TicketController extends Controller
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
     * Show listing of tickets.
     *
     * @param App\Models\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event)
    {
        $this->authorize('update', $event);

        return view('dashboard.tickets')
            ->with([
                'event'   => $event,
                'tickets' => $event->tickets,
            ]);
    }

    /**
     * Ticket creating view.
     *
     * @param App\Models\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {
        $this->authorize('update', $event);

        return view('dashboard.ticket-create')
            ->with([
                'event' => $event,
            ]);
    }

    /**
     * Storing a ticket.
     *
     * @param App\Models\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Event $event, TicketRequest $request)
    {
        $this->authorize('update', $event);

        $ticket = $event->tickets()->create([
            'name'                    => $request->name,
            'price'                   => $request->price,
            'vat'                     => $request->vat,
            'reserved'                => $request->reserved,
            'maxAmountPerTransaction' => $request->maxAmountPerTransaction,
            'availableAt'             => $request->availableAt,
            'unavailableAt'           => $request->unavailableAt,
        ]);

        return redirect()
            ->route('dashboard.tickets.view', ['event' => $event, 'ticket' => $ticket])
            ->with([
                'flash_status'  => 'success',
                'flash_message' => 'Ticket created.',
            ]);
    }

    /**
     * Show a ticket.
     *
     * @param App\Models\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event, Ticket $ticket)
    {
        $this->authorize('update', $event);

        return view('dashboard.ticket-edit')
            ->with([
                'event'  => $event,
                'ticket' => $ticket,
            ]);
    }

    /**
     * Update a ticket.
     *
     * @param App\Models\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Event $event, Ticket $ticket, TicketRequest $request)
    {
        $this->authorize('update', $event);

        $ticket->update([
            'name'                    => $request->name,
            'price'                   => $request->price,
            'vat'                     => $request->vat,
            'reserved'                => $request->reserved,
            'maxAmountPerTransaction' => $request->maxAmountPerTransaction,
            'availableAt'             => $request->availableAt,
            'unavailableAt'           => $request->unavailableAt,
        ]);

        return redirect()
            ->route('dashboard.tickets.view', ['event' => $event, 'ticket' => $ticket])
            ->with([
                'flash_status'  => 'success',
                'flash_message' => 'Ticket updated.',
            ]);
    }
}
