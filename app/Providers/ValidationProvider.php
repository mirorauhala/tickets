<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ValidationProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('validateTicketAvailabilityAtThisTime', 'App\Validators\OrderValidator@validateTicketAvailabilityAtThisTime');
        Validator::extend('validateSeatAvailability', 'App\Validators\OrderValidator@validateSeatAvailability');
        Validator::extend('validateOrderItemStatusAndSeatAvailability', 'App\Validators\OrderValidator@validateOrderItemStatusAndSeatAvailability');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
