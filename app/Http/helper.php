<?php

use Money\Money;
use Money\Currency;
use Illuminate\Support\Facades\Log;
use Money\Currencies\ISOCurrencies;
use Illuminate\Support\Facades\Route;
use Money\Formatter\IntlMoneyFormatter;
use App\Exceptions\TranslationStringNotFoundException;

/*
 * Get active class for an active route.
 *
 * @param string|array $routes
 * @param array $excludeRoutes
 * @param string $active
 * @param string $notActive
 * @return string
 */
if (!function_exists('active')) {
    function active($routes, array $excludeRoutes = [], $active = ' active', $notActive = '')
    {
        if (!is_array($routes)) {
            $routes = [$routes];
        }

        $routeCollection = collect($routes);
        $currentRoute = Route::currentRouteName();

        foreach ($excludeRoutes as $route) {
            if (str_is($route, $currentRoute)) {
                return $notActive;
            }
        }

        $filtered = $routeCollection->filter(function ($value) use ($currentRoute) {
            return str_is($value, $currentRoute);
        });

        return $filtered->isNotEmpty() ? $active : $notActive;
    }
}

/*
 * Format money.
 *
 * @return string
 */
if (! function_exists('money')) {
    function money($amount, $currency)
    {
        $money = new Money($amount, new Currency($currency));
        $currencies = new ISOCurrencies();

        $numberFormatter = new \NumberFormatter('fi', \NumberFormatter::CURRENCY);
        $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

        return $moneyFormatter->format($money);
    }
}

/*
 * String translator with error reporting.
 *
 * @return string
 */
if (! function_exists('tra')) {
    function tra($key = null, $replace = [], $locale = null)
    {
        try {
            $string = app('translator')->getFromJson($key, $replace, $locale);

            // no translation was found
            if ($string == $key) {
                throw new TranslationStringNotFoundException();
            }

            return $string;
        } catch (TranslationStringNotFoundException $e) {
            Log::info('Cannot get translate key for ' . $key . ' in ' . app()->getLocale());
        }

        return $key;
    }
}
