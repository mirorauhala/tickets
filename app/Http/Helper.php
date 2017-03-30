<?php

namespace Tikematic\Http;

use Log;
use App\Exceptions\TranslationStringNotFoundException;
use Illuminate\Support\Facades\Route;
use GrahamCampbell\Markdown\Facades\Markdown;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;

class Helper {

    /**
     * Set the current active page with an array and wildcards using the route
     * name instead of the URL.
     *
     * @return boolean
     */
    static function route_active($routes, $active = 'active') {

        $currentRoute = Route::currentRouteName();

        foreach ($routes as $route) {
          return (str_is($route, $currentRoute)) ? $active : "";
        }

    }

    /**
     * Convert markdown to html
     *
     * @return string
     */
    static function toHtml($string) {
        return Markdown::convertToHtml($string);
    }

    /**
     * Format money.
     *
     * @return string
     */
    static function decimalMoneyFormatter($amount, $currency) {
        $money = new Money($amount, new Currency($currency));
        $currencies = new ISOCurrencies();

        $numberFormatter = new \NumberFormatter('en', \NumberFormatter::CURRENCY);
        $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

        return $moneyFormatter->format($money);
    }

    /**
     * String translator with error reporting.
     *
     * @return string
     */
    static function tra($key = null, $replace = [], $locale = null) {

        try {
            $string = app('translator')->getFromJson($key, $replace, $locale);

            // no translation was found
            if($string == $key) {
                throw new TranslationStringNotFoundException;
            }

            return $string;
        } catch(TranslationStringNotFoundException $e) {
            Log::info("Cannot get translate key for ". $key ." in " .app()->getLocale());
        }

    }
}