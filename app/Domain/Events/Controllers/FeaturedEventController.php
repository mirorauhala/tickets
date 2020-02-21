<?php

namespace Domain\Events\Controllers;

use Domain\Events\Event;
use App\Http\Controllers\Controller;
use Domain\Events\Actions\GetFeaturedEvents;
use Domain\Events\ViewModels\EventIndexViewModel;

class FeaturedEventController extends Controller
{
    /**
     * Return the featured events.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetFeaturedEvents $action)
    {
        $events = $action->run();
        $viewModel = new EventIndexViewModel($events);

        return view('events.featured', $viewModel);
    }
}
