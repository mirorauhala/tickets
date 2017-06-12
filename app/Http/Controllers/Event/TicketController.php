<?php

namespace Tikematic\Http\Controllers\Event;

use Auth;
use Carbon\Carbon;
use Tikematic\Models\{Event, Ticket, Order, OrderItem};
use Illuminate\Http\Request;
use Tikematic\Http\Controllers\Controller;
use Tikematic\Http\Requests\VisitorTicketRequest;
use Illuminate\Contracts\Validation\Validator;


use Paytrail\Object\UrlSet as PaytrailUrlSet;
use Paytrail\Object\Address as PaytrailAddress;
use Paytrail\Object\Contact as PaytrailContact;
use Paytrail\Object\Payment as PaytrailPayment;
use Paytrail\Object\Product as PaytrailProduct;
use Paytrail\Http\Client as PaytrailClient;

use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\DecimalMoneyFormatter;
use Money\Money;

class TicketController extends Controller
{
    /**
     * Show event tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTickets()
    {
        // do ugly hard code for event ID
        $event = Event::findOrFail(1);

        return view('events.tickets.main')
            ->with([
                "event" => $event,
                "tickets" => $event->tickets()->availableAtThisTime()->get(),
            ]);
    }

    /**
     * Show visitor ticket view.
     *
     * @return \Illuminate\Http\Response
     */
    public function showVisitorTicket()
    {
        // do ugly hard code for event ID
        $event = Event::findOrFail(1);

        return view('events.tickets.visitor')
            ->with([
                "event" => $event,
                "ticket" => $event->tickets()->availableAtThisTime()->visitorTicket()->first(),
            ]);
    }

    /**
     * Process visitor ticket.
     *
     * @return \Illuminate\Http\Response
     */
    public function processVisitorTicket(VisitorTicketRequest $request)
    {

        // do ugly hard code for event ID
        $event = Event::findOrFail(1);

        // get ticket
        $ticket = Ticket::find($request->ticket_id);
        $ticket_amount = $request->ticket_amount;
        $order_value = $ticket_amount * $ticket->price;

        // order reference
        $order_reference = strtoupper(bin2hex(openssl_random_pseudo_bytes(6)));

        // create base order
        $order = $request->user()->orders()->create([
            "reference" => $order_reference,
            "currency" => "EUR",
            "value" => $order_value,
            "vat" => 10,
            "status" => "pending",
            "payer_name" => $request->user()->full_name(),
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
                "release_lock_after"    => Carbon::now()->addMinutes(30),
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
            'successUrl'      => route('order.place.visitor'),
            'failureUrl'      => 'https://www.demoshop.com/sv/failure',
            'notificationUrl' => 'https://www.demoshop.com/sv/notify',
        ));

        $address = new PaytrailAddress;
        $address->configure(array(
            'streetAddress'   => $request->user()->street_address,
            'postalCode'      => $request->user()->postal_code,
            'postOffice'      => $request->user()->postal_office,
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
}
