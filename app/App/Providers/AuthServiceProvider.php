<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \Domain\Events\Event::class             => \Domain\Events\Policies\EventPolicy::class,
        \Domain\Orders\Order::class             => \Domain\Orders\Policies\OrderPolicy::class,
        \Domain\OrderItems\OrderItem::class     => \Domain\OrderItems\Policies\OrderItemPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Passport::routes();

        Passport::cookie('tickets_token');
    }
}
