<?php

namespace App\Http\Controllers\Order;

use Money\Money;
use Carbon\Carbon;
use Money\Currency;
use App\Models\Event;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Payments\CheckoutPayment;
use App\Http\Requests\OrderRequest;
use Money\Currencies\ISOCurrencies;
use App\Http\Controllers\Controller;
use Money\Formatter\DecimalMoneyFormatter;

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
     * Validate request and create new visitor order.
     *
     * @return void
     */
    public function create(Event $event, OrderRequest $request)
    {
        // get ticket
        $ticket = Ticket::find($request->ticket_id);
        $ticket_amount = $request->ticket_amount;
        $order_value = $ticket_amount * $ticket->price;

        // order reference
        $order_reference = strtoupper(bin2hex(openssl_random_pseudo_bytes(6)));

        // order lock release time
        $release_lock_after = Carbon::now()->addHour();

        // create base order
        $order = $request->user()->orders()->create([
            'reference'          => $order_reference,
            'currency'           => 'EUR',
            'value'              => $order_value,
            'vat'                => 10,
            'status'             => 'pending',
            'payer_name'         => $request->user()->full_name(),
            'release_lock_after' => $release_lock_after,
            'event_id'           => $event->id,
        ]);

        // add orderitems
        $items = [];
        for ($i = 0; $i < $ticket_amount; $i++) {
            $items[] = new OrderItem([
                'title'                 => $ticket->name,
                'barcode'               => strtoupper(bin2hex(openssl_random_pseudo_bytes(6))),
                'value'                 => $ticket->price,
                'status'                => 'pending',
                'release_lock_after'    => $release_lock_after,
                'user_id'               => $request->user()->id,
                'ticket_id'             => $ticket->id,
            ]);
        }

        // get ticket value in decimals
        $money = new Money($ticket->price, new Currency('EUR'));
        $currencies = new ISOCurrencies();
        $moneyFormatter = new DecimalMoneyFormatter($currencies);

        // save order items
        $order->items()->saveMany($items);

        $checkoutOrder = [
            'STAMP'         => time(),
            'AMOUNT'        => $order_value,
            'MESSAGE'       => $ticket->name,
            'REFERENCE'     => $order_reference,
            'RETURN'        => route('orders.callback'),
            'CANCEL'        => route('orders.callback'),
            'DELIVERY_DATE' => date('Ymd'),
        ];

        $checkout = new CheckoutPayment(config('checkout.merchant'), config('checkout.secret'));

        $checkout->load($checkoutOrder);
        $checkout->validate();
        $checkout->send();

        return view('orders.bank')
            ->with([
                'banks' => $checkout->banks(),
            ]);
    }

    /**
     * Validate ticket payment callback.
     *
     * @return \Illuminate\Http\Response
     */
    public function processOrderCallback(Request $request)
    {
        $checkout = new CheckoutPayment(config('checkout.merchant'), config('checkout.secret'));
        $checkout->processCallback($request->toArray());

        if ($checkout->isPaid()) {
            // update order and order items' status to paid if they are not within lock perioid
            if ($order = Order::where('reference', $request->REFERENCE)->where('status', '!=', 'paid')->first()) {
                // update the base order
                $order->status = 'paid';
                $order->save();

                // update order items
                $order->items()->update([
                    'status' => 'paid',
                ]);

                return redirect()->route('orders.show', ['order' => $order]);
            } else {
                dump('Error: order not found or already marked paid');
            }
        } else {
            dump('Error: order not paid');
        }
    }
}
