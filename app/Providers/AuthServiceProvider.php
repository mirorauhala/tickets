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
        'App\Models\Event'      => 'App\Policies\EventPolicy',
        'App\Models\Order'      => 'App\Policies\OrderPolicy',
        'App\Models\OrderItem'  => 'App\Policies\OrderItemPolicy',
        'App\Models\Tournament' => 'App\Policies\TournamentPolicy',
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
