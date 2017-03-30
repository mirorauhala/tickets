<?php

namespace Tikematic\Http\Controllers;

use Illuminate\Http\Request;

class EventAdminController extends Controller
{
    /**
     * Show the event customers.
     *
     * @return \Illuminate\Http\Response
     */
    public function customers()
    {
        return view('events.admin.customers');
    }

}
