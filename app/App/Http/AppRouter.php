<?php

namespace App\Http;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;

class AppRouter
{
    /**
     * This is where we register application level routes. These routes aren't
     * part of any specific domain.
     *
     * @param \Illuminate\Routing\Router $router The Laravel router.
     * @return void
     */
    public function __invoke(Router $router)
    {
        $router->group(['namespace' => 'App\Http\Controllers'], function () {
            Auth::routes(['verify' => true]);
        });
    }
}
