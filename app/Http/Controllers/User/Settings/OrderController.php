<?php

namespace App\Http\Controllers\User\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\{
    UserRepository,
    OrderRepository
};

class OrderController extends Controller
{
    protected $user;
    protected $order;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $user, OrderRepository $order)
    {
        $this->middleware('auth');
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * Show the user's orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = $this->user->authenticated()->orders->sortByDesc('created_at');

        return view('settings.orders.index')
            ->with([
                "orders" => $orders,
            ]);
    }

    /**
     * Show a specific order.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSpecificOrder($reference)
    {
        // find the event
        $order = $this->order->findByReference($reference);

        // authorize action
        $this->authorize('view', $order);

        // eager load tickets
        $order->load('items.ticket', 'items.seat');

        // count orders that need to select a seat
        $ordersCount = ($order->items->filter(function ($value, $key) {
            if ($value->ticket->is_seatable == 1 && $value->seat == null) {
                return true;
            }
        })->count() > 0) ? true : false;

        return view('settings.orders.specific')
            ->with([
                "order" => $order,
                "show_form_submit" => $ordersCount,
            ]);
    }

    /**
     * Delete the user's order.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteOrder($reference, Request $request)
    {
        // get order from the reference
        $order = $this->order->findByReference($reference);

        // authorize current action
        $this->authorize('delete', $order);

        // delete order
        $this->order->deleteByReference($reference);

        return redirect()
            ->route('settings.orders')
            ->with([
                "flash_status" => 'success',
                "flash_message" => 'Tilaus poistettu.',
            ]);
    }
}
