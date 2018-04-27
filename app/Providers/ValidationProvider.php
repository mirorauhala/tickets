<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ValidationProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
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
