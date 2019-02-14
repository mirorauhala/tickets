<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
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
     * Show the user's orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = $requests->user()->orders->sortByDesc('created_at');

        return view('orders.index')
            ->with([
                'orders' => $orders,
            ]);
    }

    /**
     * Show a specific order.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $this->authorize('view', $order);

        $order->load('items.ticket', 'items.seat');

        // count orders that need to select a seat
        // NEEDS REWORK DUE TO is_seatable BEING DROPPED OFF
        $ordersCount = ($order->items->filter(function ($value, $key) {
            if ($value->ticket->is_seatable == 1 && $value->seat == null) {
                return true;
            }
        })->count() > 0) ? true : false;

        return view('orders.show')
            ->with([
                'order'            => $order,
                'show_form_submit' => $ordersCount,
            ]);
    }

    /**
     * Delete the user's order.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Order $order)
    {
        $this->authorize('delete', $order);

        $order->delete();

        return redirect()
            ->route('orders')
            ->with([
                'flash_status'  => 'success',
                'flash_message' => 'Tilaus poistettu.',
            ]);
    }
}
