<?php

namespace Tikematic\Policies;

use Tikematic\Models\User;
use Tikematic\Models\Order;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the order.
     *
     * @param  \Tikematic\User  $user
     * @param  \Tikematic\Order  $order
     * @return mixed
     */
    public function view(User $user, Order $order)
    {
        return $user->orders()->where('id', $order->id)->first();
    }

    /**
     * Determine whether the user can create orders.
     *
     * @param  \Tikematic\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update orders.
     *
     * @param  \Tikematic\User  $user
     * @param  \Tikematic\Event  $order
     * @return mixed
     */
    public function update(User $user, Order $order)
    {
        return $user->orders()->where('id', $order->id)->first();
    }

    /**
     * Determine whether the user can delete orders.
     *
     * @param  \Tikematic\User  $user
     * @param  \Tikematic\Event  $order
     * @return mixed
     */
    public function delete(User $user, Order $order)
    {
        return $user->orders()->where('id', $order->id)->first();
    }
}
