<?php

namespace Tikematic\Traits\Eloquent;

use Carbon\Carbon;

trait Purchasable
{
    /**
     * Return only available tickets.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAvailable($query)
    {
        return $query->where('availableAt', '<', Carbon::now())
            ->where('unavailableAt', '>', Carbon::now());
    }
}
