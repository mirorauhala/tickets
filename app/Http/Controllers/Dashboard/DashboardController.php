<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Event;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = auth()->user()->events;

        if (count($events) === 1) {
            return redirect()
                ->route('dashboard.show', ['event' => $events->first()]);
        }

        return view('dashboard.index')
            ->with([
                'events' => $events,
            ]);
    }

    /**
     * Display event customers.
     *
     * @param App\Models\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function customers(Event $event)
    {
        $this->authorize('update', $event);

        return view('dashboard.customers')
            ->with([
                'event'     => $event,
                'customers' => [],
            ]);
    }

    /**
     * Show listing of orders.
     *
     * @param App\Models\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function orders(Event $event)
    {
        $this->authorize('update', $event);

        return view('dashboard.orders')
            ->with([
                'event'  => $event,
                'orders' => $event->orders,
            ]);
    }
}
