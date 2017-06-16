<?php

namespace Tikematic\Providers;

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
        Validator::extend('validateTicketAvailabilityAtThisTime', 'Tikematic\Validators\OrderValidator@validateTicketAvailabilityAtThisTime');
        Validator::extend('validateSeatAvailability', 'Tikematic\Validators\OrderValidator@validateSeatAvailability');
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
