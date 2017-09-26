<?php

namespace Tikematic\Http\Controllers\Api;

use Tikematic\Models\OrderItem;
use Tikematic\Transformers\OrderItemTransformer;

class OrderItemController
{
    public function get($barcode)
    {
        $orderItem = OrderItem::where('barcode', $barcode)->first();

        return fractal()
            ->item($orderItem)
            ->parseIncludes(['ticket', 'seat', 'user', 'order'])
            ->transformWith(new OrderItemTransformer)
            ->toArray();
    }
}
