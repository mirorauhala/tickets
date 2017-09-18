<?php

namespace Tikematic\Http\Controllers\Order;

use Carbon\Carbon;
use Tikematic\Models\{Event, Ticket, Order, OrderItem};
use Illuminate\Http\Request;
use Tikematic\Http\Requests\{OrderRequest, PaytrailRequest};
use Tikematic\Http\Controllers\Controller;

use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\DecimalMoneyFormatter;
use Money\Money;

use Paytrail\Object\{
    UrlSet as PaytrailUrlSet,
    Address as PaytrailAddress,
    Contact as PaytrailContact,
    Payment as PaytrailPayment,
    Product as PaytrailProduct
};

use Paytrail\Http\Client as PaytrailClient;

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
    public function createOrder(OrderRequest $request)
    {
        // do ugly hard code for event ID
        $event = Event::findOrFail(1);

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
            "reference" => $order_reference,
            "currency" => "EUR",
            "value" => $order_value,
            "vat" => 10,
            "status" => "pending",
            "payer_name" => $request->user()->full_name(),
            "release_lock_after" => $release_lock_after,
            "event_id" => 1,
        ]);

        // add orderitems
        $items = [];
        for($i = 0; $i < $ticket_amount; $i++) {
            // save them to the db
            $items[] = new OrderItem([
                "title"                 => $ticket->name,
                "barcode"               => strtoupper(bin2hex(openssl_random_pseudo_bytes(6))),
                "value"                 => $ticket->price,
                "status"                => "pending",
                "release_lock_after"    => $release_lock_after,
                "user_id"               => $request->user()->id,
                "ticket_id"             => $ticket->id,
            ]);
        }

        // get ticket value in decimals
        $money = new Money($ticket->price, new Currency('EUR'));
        $currencies = new ISOCurrencies();
        $moneyFormatter = new DecimalMoneyFormatter($currencies);

        // save order items
        $order->items()->saveMany($items);

        $urlSet = new PaytrailUrlSet;
        $urlSet->configure(array(
            'successUrl'      => route('order.callback'),
            'failureUrl'      => 'https://www.demoshop.com/sv/failure',
            'notificationUrl' => 'https://www.demoshop.com/sv/notify',
        ));

        $address = new PaytrailAddress;
        $address->configure(array(
            'streetAddress'   => $request->user()->street_address,
            'postalCode'      => $request->user()->postal_code,
            'postalOffice'    => $request->user()->postal_office,
            'countryCode'     => $request->user()->country_code,
        ));

        $contact = new PaytrailContact;
        $contact->configure(array(
            'firstName'       => $request->user()->first_name,
            'lastName'        => $request->user()->last_name,
            'email'           => $request->user()->email,
            //'phoneNumber'     => '040123456', // optional
            //'companyName'     => 'Demo Company Ltd', // optional
            'address'         => $address,
        ));

        $payment = new PaytrailPayment;
        $payment->configure(array(
            'orderNumber'       => $order_reference,
            'urlSet'            => $urlSet,
            'contact'           => $contact,
            //'locale'            => PaytrailPayment::LOCALE_FIFI, // optional, if we can determine the locale why can't they.
        ));

        $product = new PaytrailProduct;
        $product->configure(array(
            'title'             => $ticket->name,
            'code'              => $ticket->id,
            'amount'            => number_format($ticket_amount, 2),
            'price'             => $moneyFormatter->format($money),
            'vat'               => 10.00,
            'discount'          => 0.00,
            'type'              => PaytrailProduct::TYPE_NORMAL,
        ));

        $payment->addProduct($product);

        $client = new PaytrailClient(
            env('PAYTRAIL_KEY', '13466'),
            env('PAYTRAIL_SECRET', '6pKF4jkv97zmqBJ3ZL8gUw5DfT2NMQ')
        );

        $client->connect();
        try {
            $result = $client->processPayment($payment);
        } catch (Exception $e) {
            die('Paytrail payment failed! We\'ve dispatched a group of higly trained monkeys to fix the issue. Details: ' . $e->getMessage());
        }

        return redirect()->to($result->getUrl());
    }

    /**
     * Validate gamer ticket paytrail callback.
     *
     * @return \Illuminate\Http\Response
     */
    public function processOrderCallback(PaytrailRequest $request)
    {
        // update order and order items' status to paid if they are not within lock perioid
        if($order = Order::where("reference", $request->ORDER_NUMBER)->where('status', '!=', 'paid')->first()) {

            // update the base order
            $order->status = "paid";
            $order->save();

            // update order items
            $order->items()->update([
                "status" => "paid"
            ]);


            return redirect()->route('settings.orders.specific', ['order' => $order->reference]);
        } else {
            dump("Error: order not found or already marked paid");
        }

    }



}
