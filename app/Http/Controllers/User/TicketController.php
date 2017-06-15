<?php

namespace Tikematic\Http\Controllers\User;

use Auth;
use Tikematic\Models\Order;
use Illuminate\Http\Request;
use Tikematic\Http\Controllers\Controller;

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
     * Show the user's paid tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPaidTickets()
    {

        $order_items = Auth::user()->orderItems()->paid()->get();

        return view('tickets.paid')
            ->with([
                "order_items" => $order_items,
            ]);
    }

    /**
     * Show the user's pending tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPendingTickets()
    {

        $order_items = Auth::user()->orderItems()->pending()->get();

        return view('tickets.pending')
            ->with([
                "order_items" => $order_items,
            ]);
    }

    /**
     * Show the user's unassigned tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUnassignedTickets()
    {

        $order_items = Auth::user()->orderItems()->unassigned()->get();

        return view('tickets.unassigned')
            ->with([
                "order_items" => $order_items,
            ]);
    }

    /**
     * Show the user's unassigned tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTicketRedeemView()
    {

        $order_items = Auth::user()->orderItems()->unassigned()->get();

        return view('tickets.redeem')
            ->with([
                "order_items" => $order_items,
            ]);
    }

    /**
     * Show the user's tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewTicket($order)
    {
        $ticket = Order::where('reference', $order)->first();

        return view('tickets.view')
            ->with([
                "ticket" => $ticket,
            ]);
    }
}
