<?php

namespace App\Http\Controllers\User;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function index(Request $request)
    {
        $user = $request->user()->load('orderItems.order', 'orderItems.order.event', 'orderItems.seat');

        return view('tickets.index')
            ->with([
                'items' => $user->orderItems->where('status', 'paid'),
            ]);
    }

    /**
     * Show the user's tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTicket(OrderItem $item)
    {
        $this->authorize('view', $item);

        $item->load('order', 'order.user');

        return view('tickets.share')
            ->with([
                'item' => $item,
            ]);
    }

    /**
     * Show ticket's redeem form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRedeem()
    {
        return view('tickets.redeem');
    }

    /**
     * Create redeem code.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRedeemCode(OrderItem $item)
    {
        $this->authorize('update', $item);

        $item->redeem_code = strtoupper(bin2hex(openssl_random_pseudo_bytes(6)));
        $item->save();

        return redirect()
            ->route('tickets.share', $item);
    }

    /**
     * Delete redeem code.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteRedeemCode(OrderItem $item)
    {
        $this->authorize('update', $item);

        $item->redeem_code = null;
        $item->save();

        return redirect()
            ->route('tickets.share', $item);
    }

    /**
     * Create redeem code.
     *
     * @return \Illuminate\Http\Response
     */
    public function processRedeemCode(Request $request)
    {
        $item = OrderItem::where('redeem_code', $request->redeem_code)->first();
        if (! $item == null) {
            $item->redeem_code = null;
            $item->user_id = $request->user()->id;
            $item->save();

            return redirect()
            ->route('tickets.redeem')
            ->with([
                'status'         => 'success',
                'status_message' => 'Redeem code applied.',
            ]);
        }

        return redirect()
            ->route('tickets.redeem')
            ->with([
                'status'         => 'danger',
                'status_message' => 'Not a valid redeem code.',
            ]);
    }
}
