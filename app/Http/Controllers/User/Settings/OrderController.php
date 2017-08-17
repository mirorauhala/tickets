<?php

namespace Tikematic\Http\Controllers\User\Settings;

use Tikematic\Models\Order;
use Illuminate\Http\Request;
use Tikematic\Http\Controllers\Controller;

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
    public function showOrders(Request $request)
    {
        $user = $request->user();

        return view('settings.orders.all')
            ->with([
                "orders" => $user->orders->sortByDesc('created_at'),
            ]);
    }

    /**
     * Show a specific order.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSpecificOrder($order)
    {
        $order = Order::where('reference', $order)->firstOrFail();

        $this->authorize('view', $order);

        $order_items = $order->items;

        // has seatable tickets?
        $showFormSubmit = 0;
        foreach($order_items as $key=>$item) {
            if($item->ticket->is_seatable == 1 && $item->seat == null) {
                $showFormSubmit++;
            }
        }

        return view('settings.orders.specific')
            ->with([
                "order" => $order,
                "order_items" => $order_items,
                "show_form_submit" => $showFormSubmit,
            ]);
    }

    /**
     * Delete the user's order.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteOrder($order, Request $request)
    {
        // get order from the reference
        $order = Order::where('reference', $order)->firstOrFail();

        // get user model from request
        $user = $request->user();

        // authorize current action
        $this->authorize('delete', $order);

        if($order->user_id == $user->id) {
            Order::where('reference', $order)->delete();

            return redirect()
                ->route('settings.orders.all')
                ->with([
                    "flash_status" => 200,
                    "flash_message" => 'Tilaus poistettu.',
                ]);
        }

        return redirect()
            ->route('settings.orders.all')
            ->with([
                "flash_status" => 500,
                "flash_message" => 'Tilausta ei poistettu.',
            ]);
    }

}
