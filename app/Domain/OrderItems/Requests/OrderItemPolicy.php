<?php

namespace Domain\OrderItems\Policies;

use Domain\Users\User;
use Domain\OrderItems\OrderItem;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the order.
     *
     * @param Domain\Users\User  $user
     * @param Domain\OrderItems\OrderItem $item
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
     * @param Domain\Users\User $user
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
     * @param Domain\Users\User  $user
     * @param Domain\OrderItems\OrderItem $item
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
     * @param Domain\Users\User  $user
     * @param Domain\OrderItems\OrderItem $item
     *
     * @return mixed
     */
    public function delete(User $user, OrderItem $item)
    {
        return $user->orderItems()->status('pending')->where('id', $item->id)->first();
    }
}
