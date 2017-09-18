<?php

namespace Tikematic\Providers;

use Illuminate\Support\ServiceProvider;

use Tikematic\Repositories\Contracts\{
    UserRepository,
    TicketRepository,
    OrderRepository
};

use Tikematic\Repositories\Eloquent\{
    EloquentUserRepository,
    EloquentTicketRepository,
    EloquentOrderRepository
};

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(TicketRepository::class, EloquentTicketRepository::class);
        $this->app->bind(OrderRepository::class, EloquentOrderRepository::class);
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
