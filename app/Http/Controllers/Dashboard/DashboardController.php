<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Event;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
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
     * @param Event $event
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
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
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function orders(Event $event)
    {
        $this->authorize('update', $event);

        $event = $event->load('orders.items');

        return view('dashboard.orders')
            ->with([
                'event'  => $event,
                'orders' => $event->orders,
            ]);
    }
}
