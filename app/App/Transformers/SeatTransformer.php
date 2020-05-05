<?php

namespace App\Transformers;

use Domain\Seats\Seat;
use League\Fractal\TransformerAbstract;

class SeatTransformer extends TransformerAbstract
{
    /**
     * @param Domain\Seats\Seat
     * @return array
     */
    public function transform(Seat $seat)
    {
        return [
            'id'     => $seat->id,
            'name'   => $seat->name,
            'status' => $seat->status,
        ];
    }
}
