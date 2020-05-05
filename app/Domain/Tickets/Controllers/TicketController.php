<?php

namespace Domain\Tickets\Controllers;

use Domain\Orders\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
     * Show all of the user's tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user()->load(
            'orderItems.order',
            'orderItems.order.event',
            'orderItems.seat'
        );

        return view('tickets.index')
            ->with([
                'tickets' => $user->orderItems->where('status', 'paid'),
            ]);
    }

    /**
     * Show the user's ticket.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(OrderItem $item)
    {
        $this->authorize('view', $item);

        $item->load('order', 'order.user');

        return view('tickets.share')
            ->with([
                'item' => $item,
            ]);
    }
}
