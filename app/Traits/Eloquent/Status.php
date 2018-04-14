<?php

namespace App\Traits\Eloquent;

use Carbon\Carbon;

trait Status
{
    /**
     * Query for status.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', '=', $status);
    }
}
