<?php

namespace App\Traits\Eloquent;

use Carbon\Carbon;

trait Purchasable
{
    /**
     * Return only purchasable tickets.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePurchasable($query)
    {
        return $query->where('availableAt', '<', Carbon::now())
            ->where('unavailableAt', '>', Carbon::now());
    }
}
