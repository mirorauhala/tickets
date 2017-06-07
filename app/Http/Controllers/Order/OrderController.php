<?php

namespace Tikematic\Http\Controllers\Order;

use Carbon\Carbon;
use Tikematic\Models\{Map, Ticket, Order, OrderItem};
use Tikematic\Models\Transaction;
use Illuminate\Http\Request;
use Tikematic\Http\Requests\OrderRequest;
use Tikematic\Http\Controllers\Controller;

use Paytrail\Object\UrlSet as PaytrailUrlSet;
use Paytrail\Object\Address as PaytrailAddress;
use Paytrail\Object\Contact as PaytrailContact;
use Paytrail\Object\Payment as PaytrailPayment;
use Paytrail\Object\Product as PaytrailProduct;
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
     * Validate request and create new order.
     *
     * @return void
     */
    public function createNewOrder(OrderRequest $request)
    {

        $tickets = $request->tickets;

        // filter each ticket one-by-one
        foreach($tickets as $key=>$data) {

            // clears tickets from array that have no amount
            if($data['amount'] <= 0) {
                unset($tickets[$key]);
            }
        }

        // return view if there are tickets left
        if(count($tickets) > 0) {

            // iterate over all tickets
            foreach($tickets as $key=>$data) {
                // clears tickets from array that have no amount
                if($data['amount'] <= 0) {
                    unset($tickets[$key]);
                }
            }

            //
            // N+1 issue
            //
            // Could be fixed by using findMany() or find() as it will
            // call findMany() internally. However the $tickets array
            // needs to be flattened multiple times.
            //
            // Left as is to move quicker

            foreach($tickets as $key=>$data) {
                $allTickets[$key]['model'] = Ticket::findOrFail($data['id']);
                $allTickets[$key]['amount'] = $data['amount'];
            }

            // Calculate total order price

            $total = 0;
            foreach($allTickets as $key=>$data) {

                // get price for one
                $price = $allTickets[$key]['model']->price;

                // multiply
                $totalPerType = $price * $allTickets[$key]['amount'];

                // add
                $total = $total + $totalPerType;
            }


            // create new base order
            $order = $request->user()->orders()->create([
                "reference" => strtoupper(bin2hex(openssl_random_pseudo_bytes(6))),
                "currency" => "EUR",
                "value" => $total,
                "vat" => 10,
                "status" => "pending",
                "payer_name" => $request->user()->full_name(),
                "event_id" => 1,
            ]);

            // prepare OrderItem array for mass assigning
            $orderItems = [];
            foreach($allTickets as $key=>$data) {
                for($i = 0; $i < $data['amount']; $i++) {
                    // save them to the db
                    $order->items()->create([
                        "title" => $data['model']->name,
                        "barcode" => strtoupper(bin2hex(openssl_random_pseudo_bytes(6))),
                        "value" => $data['model']->price,
                        "release_lock_after" => Carbon::now(),
                        "user_id" => $request->user()->id,
                        "ticket_id" => $data['model']->id,
                    ]);
                }
            }

            return redirect()
                ->route('order.view', ['order' => $order->reference]);


        } else {
            return redirect()
                ->back()
                ->withErrors([
                    "msg" => "There are no tickets selected",
                ]);
        }


    }

    /**
     * View the order
     *
     * @return \Illuminate\Http\Response
     */
    public function viewOrder($reference)
    {

        $order = Order::where('reference', $reference)->firstOrFail();
        $order_items = $order->items;

        // has seatable tickets?
        $count_seats = 0;
        foreach($order_items as $key=>$item) {
            if($item->ticket->is_seatable == 1) {
                $count_seats++;
            }
        }

        if($count_seats > 0) {
            $maps = Map::where('event_id', 1)->get();
            $maps->load('seats');
        } else {
            $maps = null;
        }

        return view('order.view')
            ->with([
                "order" => $order,
                "order_items" => $order_items,
                "count_seats" => $count_seats,
                "maps" => $maps,
            ]);

    }

    /**
     * Validate the order
     *
     * @return \Illuminate\Http\Response
     */
    public function processOrderPlacement(OrderRequest $request)
    {
        // get the tickets
        $tickets = $request->tickets;

        // filter each ticket one-by-one
        foreach($tickets as $key=>$data) {

            // clears tickets from array that have no amount
            if($data['amount'] <= 0) {
                unset($tickets[$key]);
            }
        }

        // return view if there are tickets left
        if(count($tickets) > 0) {
            // iterate over all tickets
            foreach($tickets as $key=>$data) {
                // clears tickets from array that have no amount
                if($data['amount'] <= 0) {
                    unset($tickets[$key]);
                }
            }

            $allTickets = [];
            foreach($tickets as $key=>$data) {
                $allTickets[$key]['model'] = Ticket::findOrFail($data['id']);
                $allTickets[$key]['amount'] = $data['amount'];
            }

            /**
             * CHECK IF THERE ARE ANY SEATABLE TICKETS
             */

            $is_any_ticket_seatable = false;
            foreach($allTickets as $key=>$data) {
                dd($data['model']->is_seatable);
            }

            if($is_any_ticket_seatable) {
                // require maps to be locked

            }


            $urlSet = new UrlSet;
            $urlSet->configure(array(
                'successUrl'      => 'https://www.demoshop.com/sv/success',
                'failureUrl'      => 'https://www.demoshop.com/sv/failure',
                'notificationUrl' => 'https://www.demoshop.com/sv/notify',
                'pendingUrl'      => 'https://www.demoshop.com/sv/pending',
            ));

            $address = new Address;
            $address->configure(array(
                'streetAddress'   => 'Test street 1',
                'postalCode'      => '12345',
                'postOffice'      => 'Helsinki',
                'countryCode'     => 'FI',
            ));

            $contact = new Contact;
            $contact->configure(array(
                'firstName'       => 'Test',
                'lastName'        => 'Person',
                'email'           => 'test.person@demoshop.com',
                'phoneNumber'     => '040123456',
                'companyName'     => 'Demo Company Ltd',
                'address'         => $address,
            ));

            $payment = new Payment;
            $payment->configure(array(
                'orderNumber'     => 1,
                'urlSet'          => $urlSet,
                'contact'         => $contact,
                'locale'          => Payment::LOCALE_ENUS,
            ));

            $product = new Product;
            $product->configure(array(
                'title'           => 'Test product',
                'code'            => '01234',
                'quantity'        => 1.00,
                'price'           => 19.90,
                'vat'             => 23.00,
                'discount'        => 0.00,
                'type'            => Product::TYPE_NORMAL,
            ));

            $payment->addProduct($product);

            $client = new Client('13466', '6pKF4jkv97zmqBJ3ZL8gUw5DfT2NMQ');
            $client->connect();
            try {
                $result = $client->processPayment($payment);
            } catch (Exception $e) {
                die('Paytrail payment failed: ' . $e->getMessage());
            }

            return redirect()->to($result->getUrl());


            return view('order.new')
                ->with([
                    "tickets" => $allTickets,
                ]);
        } else {
            return redirect()
                ->back()
                ->withErrors([
                    "msg" => "There are no tickets selected",
                ]);
        }
    }

    /**
     * Validate order and then make it self-destruct in half an hour.
     *
     * @return \Illuminate\Http\Response
     */
    public function asdasd(OrderRequest $request)
    {
        // create new pending transaction,
        // tickets are reserved for 30 minutes

        $transaction = new Transaction;
        $transaction->code = uniqid();
        $transaction->status = 'pending';
        $transaction->release_lock_after = Carbon::now()->addMinutes(30);
        $transaction->save();

        // attach the items (tickets) to the transaction

        //


        return view('order.place')
            ->with([
                "tickets" => $request->tickets,
            ]);
    }
}
