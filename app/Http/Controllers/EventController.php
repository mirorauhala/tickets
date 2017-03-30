<?php

namespace Tikematic\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('events.details');
    }

    /**
     * Show event maps.
     *
     * @return \Illuminate\Http\Response
     */
    public function maps()
    {
        return view('events.maps');
    }

    /**
     * Show event tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function tickets()
    {
        return view('events.tickets');
    }

    /**
     * Show event tournaments.
     *
     * @return \Illuminate\Http\Response
     */
    public function tournaments()
    {
        return view('events.tournaments');
    }
}
