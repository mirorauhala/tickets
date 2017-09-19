<?php

namespace Tikematic\Providers;

use Illuminate\Support\ServiceProvider;

use Tikematic\Repositories\Contracts\{
    UserRepository,
    SeatRepository,
    TicketRepository,
    OrderRepository,
    OrderItemRepository
};

use Tikematic\Repositories\Eloquent\{
    EloquentUserRepository,
    EloquentSeatRepository,
    EloquentTicketRepository,
    EloquentOrderRepository,
    EloquentOrderItemRepository
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
        $this->app->bind(SeatRepository::class, EloquentSeatRepository::class);
        $this->app->bind(TicketRepository::class, EloquentTicketRepository::class);
        $this->app->bind(OrderRepository::class, EloquentOrderRepository::class);
        $this->app->bind(OrderItemRepository::class, EloquentOrderItemRepository::class);
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
