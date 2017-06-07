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
                "orders" => $user->orders,
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

        return view('settings.orders.specific')
            ->with([
                "order" => $order,
                "order_items" => $order->items,
            ]);
    }

}
