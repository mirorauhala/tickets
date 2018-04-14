<?php

namespace App\Http\Controllers\Event;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // do ugly hard code for event ID
        $event = Event::findOrFail(1);

        return view('events.details')
            ->with([
                "event" => $event,
            ]);
    }
}
