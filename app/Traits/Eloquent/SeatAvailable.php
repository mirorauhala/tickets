<?php

namespace Tikematic\Traits\Eloquent;

trait SeatAvailable
{
    /**
     * Return only available seats.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }
}
