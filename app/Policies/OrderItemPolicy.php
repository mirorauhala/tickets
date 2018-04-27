<?php

namespace App\Policies;

use App\Models\User;
use App\Models\OrderItem;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the order.
     *
     * @param  \App\User  $user
     * @param  \App\Order  $order
     * @return mixed
     */
    public function view(User $user, OrderItem $order)
    {
        return $user->orderItems()->where('id', $order->id)->count() > 0;
    }

    /**
     * Determine whether the user can create orders.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update orders.
     *
     * @param  \App\User  $user
     * @param  \App\Event  $order
     * @return mixed
     */
    public function update(User $user, OrderItem $order)
    {
        return $user->orderItems()->where('id', $order->id)->first();
    }

    /**
     * Determine whether the user can delete orders.
     *
     * @param  \App\User  $user
     * @param  \App\Event  $order
     * @return mixed
     */
    public function delete(User $user, OrderItem $order)
    {
        return $user->orderItems()->status('pending')->where('id', $order->id)->first();
    }
}
