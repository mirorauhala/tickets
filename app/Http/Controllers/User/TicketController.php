<?php

namespace Tikematic\Http\Controllers\User;

use Auth;
use Tikematic\Models\{Order, OrderItem};
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

        $user = Auth::user();

        $user->load('orderItems.order');

        return view('tickets.paid')
            ->with([
                "order_items" => $user->orderItems->where('status', 'paid'),
            ]);
    }

    /**
     * Show the user's pending tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPendingTickets()
    {

        $user = Auth::user();

        $user->load('orderItems.order');

        return view('tickets.pending')
            ->with([
                "order_items" => $user->orderItems->where('status', 'pending'),
            ]);
    }

    /**
     * Show the user's unassigned tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUnassignedTickets()
    {

        $user = Auth::user();

        $user->load('orderItems.order');

        return view('tickets.unassigned')
            ->with([
                "order_items" => $user->orderItems->where('status', 'unassigned'),
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
    public function viewTicket($barcode)
    {
        $order_item = OrderItem::where('barcode', $barcode)->first();

        return view('tickets.view')
            ->with([
                "order_item" => $order_item,
            ]);
    }
}
