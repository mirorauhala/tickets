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
     * Show the user's tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $order_items = Auth::user()->orderItems()->get();

        return view('tickets.all')
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
