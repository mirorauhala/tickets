<?php

namespace Tikematic\Http\Controllers\User\Settings;

use Tikematic\Models\Order;
use Illuminate\Http\Request;
use Tikematic\Http\Controllers\Controller;

class OrderController extends Controller
{

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
        $order_items = $order->items;

        // has seatable tickets?
        $count_seats = 0;
        foreach($order_items as $key=>$item) {
            if($item->ticket->is_seatable == 1) {
                $count_seats++;
            }
        }

        return view('settings.orders.specific')
            ->with([
                "order" => $order,
                "order_items" => $order_items,
                "count_seats" => $count_seats,
            ]);
    }

    /**
     * Delete the user's order.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteOrder($order, Request $request)
    {
        $user = $request->user();

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
