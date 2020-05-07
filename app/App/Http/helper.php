<?php

use Money\Money;
use Money\Currency;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use Money\Currencies\ISOCurrencies;
use Illuminate\Support\Facades\Route;
use Money\Formatter\IntlMoneyFormatter;

if (! function_exists('active')) {
    /**
     * Get active class for an active route.
     *
     * @param  string|array $routes        The routes to match against the active page.
     * @param  array        $excludeRoutes Routes that should be excluded.
     * @param  bool         $return        Return in boolean.
     * @return bool|string
     */
    function active($routes, array $excludeRoutes = [], $return = false)
    {
        if (! is_array($routes)) {
            $routes = [$routes];
        }

        $routeCollection = collect($routes);
        $currentRoute = Route::currentRouteName();

        foreach ($excludeRoutes as $route) {
            if (Str::is($route, $currentRoute)) {
                return $notActive;
            }
        }

        $filtered = $routeCollection->filter(function ($value) use ($currentRoute) {
            return Str::is($value, $currentRoute);
        });

        if ($return) {
            return $filtered->isNotEmpty();
        }

        return $filtered->isNotEmpty() ? ' active' : '';
    }
}

if (! function_exists('money')) {
    /**
     * Format money.
     *
     * @param  int|string $amount   The amount of money.
     * @param  string     $currency The currency for the money.
     * @return string
     */
    function money($amount, $currency)
    {
        $money = new Money($amount, new Currency($currency));
        $currencies = new ISOCurrencies();

        $numberFormatter = new \NumberFormatter(
            'fi',
            \NumberFormatter::CURRENCY
        );
        $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

        return $moneyFormatter->format($money);
    }
}

if (! function_exists('current_commit')) {
    /**
     * Returns the current git HEAD SHA1 hash.
     *
     * @return string|void
     */
    function current_commit()
    {
        if (App::environment(['local', 'staging'])) {
            return trim(shell_exec('git rev-parse HEAD'));
        }
    }
}
