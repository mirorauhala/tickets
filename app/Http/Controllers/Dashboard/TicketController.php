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
     * Ticket creating view.
     *
     * @param App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {
        $this->authorize('update', $event);

        return view('dashboard.ticket-create')
            ->with([
                'events' => auth()->user()->events,
            ]);
    }

    /**
     * Storing a ticket.
     *
     * @param App\Models\Event $event
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
            'is_seatable'             => $request->is_seatable,
        ]);

        return redirect()
            ->route('dashboard.ticket', ['event' => $event, 'ticket' => $ticket]);
    }
}
