<?php

namespace App\Http\Controllers\Api;

use App\Models\OrderItem;
use App\Transformers\OrderItemTransformer;

class OrderItemController
{
    public function get($barcode)
    {
        $orderItem = OrderItem::where('barcode', $barcode)->first();

        return fractal()
            ->item($orderItem)
            ->parseIncludes(['ticket', 'seat', 'user', 'order'])
            ->transformWith(new OrderItemTransformer())
            ->toArray();
    }
}
