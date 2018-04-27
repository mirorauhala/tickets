<?php

namespace App\Providers;

use App\Repositories\Contracts\OrderItemRepository;
use App\Repositories\Contracts\OrderRepository;
use App\Repositories\Contracts\SeatRepository;
use App\Repositories\Contracts\TicketRepository;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\Eloquent\EloquentOrderItemRepository;
use App\Repositories\Eloquent\EloquentOrderRepository;
use App\Repositories\Eloquent\EloquentSeatRepository;
use App\Repositories\Eloquent\EloquentTicketRepository;
use App\Repositories\Eloquent\EloquentUserRepository;
use Illuminate\Support\ServiceProvider;

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
