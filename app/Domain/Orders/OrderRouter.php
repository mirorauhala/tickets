<?php

namespace Domain\Orders;

use Illuminate\Routing\Router;

class OrderRouter
{
    /**
     * Here we register the routes for the orders.
     *
     * @param Illuminate\Routing\Router $router
     * @return void
     */
    public function __invoke(Router $router)
    {
        $router->resource('/orders', 'Domain\Orders\Controllers\OrderController')->except(['edit', 'update']);

        $router->get('/lang/{lang}', function (Request $request, $lang) {
            if (! in_array($lang, ['fi', 'en'])) {
                return abort(400, 'Language not supported.');
            }

            $request->session()->put('override_language', $lang);

            if ($request->header('referer')) {
                return redirect($request->header('referer'));
            }

            return redirect()->route('home');
        })->name('lang');
    }
}
