<?php

namespace Tikematic\Http\Controllers\EventAdmin;

use Tikematic\Models\Event;
use Illuminate\Http\Request;
use Tikematic\Http\Controllers\Controller;

class CustomerController extends Controller
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
    public function customers()
    {
        // do ugly hard code for event ID
        $event = Event::with('customers')->findOrFail(1);

        return view('events.admin.customers')
            ->with([
                "event" => $event,
                "customers" => $event->customers()->paginate(15),
            ]);
    }

}
