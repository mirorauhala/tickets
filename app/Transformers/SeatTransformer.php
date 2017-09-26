<?php

namespace Tikematic\Transformers;

use Tikematic\Models\Seat;
use League\Fractal\TransformerAbstract;

class SeatTransformer extends TransformerAbstract
{
    public function transform(Seat $seat)
    {
        return [
            'id' => $seat->id,
            'name' => $seat->name,
            'status' => $seat->status,
        ];
    }
}
