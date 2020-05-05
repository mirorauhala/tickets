<?php

namespace Domain\Events;

use Illuminate\Routing\Router;
use Domain\Events\Controllers\EventController;
use Domain\Events\Controllers\FeaturedEventController;

class EventRouter {
    /**
     * These are the web routes for events.
     *
     * @param Illuminate\Routing\Router  $router
     * @return void
     */
    public function __invoke(Router $router) {
        $router->get('/', [FeaturedEventController::class, 'index'])->name('home');
        $router->resource('/events', EventController::class)->only(['index', 'show']);
    }
}
