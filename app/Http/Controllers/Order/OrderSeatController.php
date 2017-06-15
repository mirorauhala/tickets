<?php

namespace Tikematic\Http\Controllers\Order;

use Tikematic\Models\{Event, Order};
use Illuminate\Http\Request;
use Tikematic\Http\Requests\OrderSeatRequest;
use Tikematic\Http\Controllers\Controller;

class OrderSeatController extends Controller
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
     * Show the event customers.
     *
     * @return \Illuminate\Http\Response
     */
    public function addSeatToOrderItems( OrderSeatRequest $request)
    {
        dd($request);

        foreach($request->seat as $order_item_id=>$seat_id) {
            Seat::where('id', $seat_id)->update([
                "order_item_id" => $order_item_id
            ]);
        }

        return view('order.view.')
            ->with([
                "event" => $event,
                "orders" => $event->orders()->paginate(15),
            ]);
    }

}
