<?php

namespace Domain\Dashboard\Controllers;

use Domain\Tickets\Ticket;
use Domain\Events\Event;
use App\Http\Controllers\Controller;
use Domain\Tickets\Requests\TicketRequest;

class DashboardTicketsController extends Controller
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
     * @param Domain\Events\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event)
    {
        $this->authorize('update', $event);

        return view('dashboard.tickets.index')
            ->with([
                'event'   => $event,
                'tickets' => $event->tickets,
            ]);
    }

    /**
     * Ticket creating view.
     *
     * @param Domain\Events\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {
        $this->authorize('update', $event);

        return view('dashboard.tickets.create')
            ->with([
                'event' => $event,
            ]);
    }

    /**
     * Storing a ticket.
     *
     * @param Domain\Events\Event $event
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
            ->route('dashboard.tickets.show', ['event' => $event, 'ticket' => $ticket])
            ->with([
                'flash_status'  => 'success',
                'flash_message' => 'Ticket created.',
            ]);
    }

    /**
     * Show a ticket.
     *
     * @param Domain\Events\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event, Ticket $ticket)
    {
        $this->authorize('update', $event);

        return view('dashboard.tickets.edit')
            ->with([
                'event'  => $event,
                'ticket' => $ticket,
            ]);
    }

    /**
     * Edit a ticket.
     *
     * @param Domain\Events\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event, Ticket $ticket)
    {
        $this->authorize('update', $event);

        return view('dashboard.tickets.edit')
            ->with([
                'event'  => $event,
                'ticket' => $ticket,
            ]);
    }

    /**
     * Update a ticket.
     *
     * @param Domain\Events\Event $event
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
            ->route('dashboard.tickets.show', ['event' => $event, 'ticket' => $ticket])
            ->with([
                'flash_status'  => 'success',
                'flash_message' => 'Ticket updated.',
            ]);
    }

    /**
     * Deleted a ticket.
     *
     * @param Domain\Events\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event, Ticket $ticket)
    {
        $this->authorize('update', $event);

        $ticket->delete();

        return redirect()
            ->route('dashboard.tickets.index', ['event' => $event])
            ->with([
                'flash_status'  => 'success',
                'flash_message' => 'Ticket deleted.',
            ]);
    }
}
