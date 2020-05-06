<?php

namespace Domain\OrderItems\Policies;

use Domain\Users\User;
use Domain\Orders\OrderItem;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the order.
     *
     * @param \App\User  $user
     * @param \App\OrderItem $item
     *
     * @return mixed
     */
    public function view(User $user, OrderItem $item)
    {
        return $user->orderItems()->where('id', $item->id)->count() > 0;
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
     * @param \App\OrderItem $item
     *
     * @return mixed
     */
    public function update(User $user, OrderItem $item)
    {
        return $item->order->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete orders.
     *
     * @param \App\User  $user
     * @param \App\OrderItem $item
     *
     * @return mixed
     */
    public function delete(User $user, OrderItem $item)
    {
        return $user->orderItems()->status('pending')->where('id', $item->id)->first();
    }
}
