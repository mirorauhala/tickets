<?php

namespace Tikematic\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'vat', 'currency', 'standalone', 'availableAt', 'unavailableAt', 'event_id',
    ];

    protected $dates = [
        'availableAt',
        'unavailableAt',
    ];


    /**
     * Scope a query to only include available tickets.
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
