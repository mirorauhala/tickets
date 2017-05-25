<?php

namespace Tikematic\Http\Controllers\User\Settings;

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
    public function showSpecificOrder()
    {
        return view('settings.orders.specific');
    }

}
