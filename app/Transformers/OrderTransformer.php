<?php

namespace App\Transformers;

use Helper;
use App\Models\Order;
use League\Fractal\TransformerAbstract;

class OrderTransformer extends TransformerAbstract
{
    public function transform(Order $order)
    {
        return [
            'id' => $order->id,
            'value' => $order->value,
            'value_pretty' => Helper::decimalMoneyFormatter($order->value, "EUR"),
        ];
    }
}
