<?php

namespace Tikematic\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Tikematic\Models\Event' => 'Tikematic\Policies\EventPolicy',
        'Tikematic\Models\Order' => 'Tikematic\Policies\OrderPolicy',
        'Tikematic\Models\OrderItem' => 'Tikematic\Policies\OrderItemPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
