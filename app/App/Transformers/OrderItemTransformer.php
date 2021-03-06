<?php

namespace App\Transformers;

use Domain\OrderItems\OrderItem;
use League\Fractal\TransformerAbstract;

class OrderItemTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['ticket', 'seat', 'user', 'order'];

    /**
     * @param Domain\OrderItems\OrderItem $orderItem
     * @return array
     */
    public function transform(OrderItem $orderItem)
    {
        return [
            'id'           => $orderItem->id,
            'title'        => $orderItem->title,
            'barcode'      => $orderItem->barcode,
            'value'        => $orderItem->value,
            'value_pretty' => money($orderItem->value, 'EUR'),
        ];
    }

    public function includeTicket(OrderItem $orderItem)
    {
        return $this->item($orderItem->ticket, new TicketTransformer());
    }

    public function includeSeat(OrderItem $orderItem)
    {
        return $this->item($orderItem->seat, new SeatTransformer());
    }

    public function includeUser(OrderItem $orderItem)
    {
        return $this->item($orderItem->user, new UserTransformer());
    }

    public function includeOrder(OrderItem $orderItem)
    {
        return $this->item($orderItem->order, new OrderTransformer());
    }
}
