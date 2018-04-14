<?php

namespace App\Traits\Eloquent;

trait IsActive
{

    /**
     * Scope a query to only include active rows.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', '=', true);
    }
}
