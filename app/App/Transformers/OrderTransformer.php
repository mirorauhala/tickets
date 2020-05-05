<?php

namespace App\Transformers;

use Domain\Orders\Order;
use League\Fractal\TransformerAbstract;

class OrderTransformer extends TransformerAbstract
{
    /**
     * @param Domain\Orders\Order
     * @return array
     */
    public function transform(Order $order)
    {
        return [
            'id'           => $order->id,
            'value'        => $order->value,
            'value_pretty' => money($order->value, 'EUR'),
        ];
    }
}
