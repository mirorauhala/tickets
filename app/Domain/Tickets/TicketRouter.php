<?php

namespace Domain\Tickets;

use Illuminate\Routing\Router;
use Domain\Tickets\Controllers\TicketController;

class TicketRouter
{
    /**
     * Here we register the routes for the tickets.
     *
     * @param Illuminate\Routing\Router $router
     * @return void
     */
    public function __invoke(Router $router)
    {
        $router->resource('/tickets', TicketController::class)->only(['index', 'show']);
    }
}
