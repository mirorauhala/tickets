<?php

namespace Tikematic\Http\Controllers\Order;

use Carbon\Carbon;
use Tikematic\Models\Event;
use Tikematic\Models\Transaction;
use Illuminate\Http\Request;
use Tikematic\Http\Requests\OrderRequest;
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
     * View the order
     *
     * @return \Illuminate\Http\Response
     */
    public function viewOrder(OrderRequest $request)
    {

        return view('order.view')
            ->with([
                "tickets" => $request,
            ]);
    }

    /**
     * Validate order and then make it self-destruct in half an hour.
     *
     * @return \Illuminate\Http\Response
     */
    public function placeOrder(OrderRequest $request)
    {
        // create new pending transaction,
        // tickets are reserved for 30 minutes

        $transaction = new Transaction;
        $transaction->code = uniqid();
        $transaction->status = 'pending';
        $transaction->pending_lock = Carbon::now()->addMinutes(30);
        $transaction->save();

        // attach the items (tickets) to the transaction

        //


        return view('order.place')
            ->with([
                "tickets" => $request->tickets,
            ]);
    }
}
