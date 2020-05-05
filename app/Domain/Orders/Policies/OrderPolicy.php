<?php

namespace Domain\Orders\Policies;

use Domain\Users\User;
use Domain\Orders\Order;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the order.
     *
     * @param \App\User  $user
     * @param \App\Order $order
     *
     * @return mixed
     */
    public function view(User $user, Order $order)
    {
        return $user->orders()->where('id', $order->id)->first();
    }

    /**
     * Determine whether the user can create orders.
     *
     * @param \App\User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update orders.
     *
     * @param \App\User  $user
     * @param \App\Event $order
     *
     * @return mixed
     */
    public function update(User $user, Order $order)
    {
        return $user->orders()->where('id', $order->id)->first();
    }

    /**
     * Determine whether the user can delete orders.
     *
     * @param \App\User  $user
     * @param \App\Event $order
     *
     * @return mixed
     */
    public function delete(User $user, Order $order)
    {
        return $user->orders()->status('pending')->where('id', $order->id)->first();
    }
}
