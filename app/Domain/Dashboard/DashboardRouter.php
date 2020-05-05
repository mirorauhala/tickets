<?php

namespace Domain\Dashboard;

use Illuminate\Routing\Router;

class DashboardRouter {

    /**
     * Here you register the appropriate namespace for this router.
     *
     * @var array
     */
    protected $attributes = [
        'prefix' => '/dashboard',
        'namespace' => 'Domain\\Dashboard\\Controllers'
    ];

    /**
     * Here you register the web routes for the event dashboard.
     *
     * @param Illuminate\Routing\Router
     * @return void
     */
    public function __invoke(Router $router) {
        $router->group($this->attributes, function () use ($router) {
            $router->get('', 'DashboardController@index')->name('dashboard');
            $router->get('/{event}', 'DashboardController@customers')->name('dashboard.show');
            $router->get('/{event}/customers', 'DashboardController@customers')->name('dashboard.customers');
            $router->get('/{event}/orders', 'DashboardController@orders')->name('dashboard.orders');
            $router->group(['prefix' => '/{event}', 'as' => 'dashboard.'], function () use ($router) {
                $router->resource('tickets', 'DashboardTicketsController');
                $router->resource('tournaments', 'DashboardTournamentsController');
                $router->resource('maps', 'DashboardMapsController');
            });
            $router->get('/{event}/settings', 'DashboardEventController@show')->name('dashboard.settings');
            $router->post('/{event}/settings', 'DashboardEventController@update');
        });

    }
}
