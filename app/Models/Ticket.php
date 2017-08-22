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
        'name', 'price', 'vat', 'reserved', 'maxAmountPerTransaction', 'availableAt', 'unavailableAt', 'is_seatable', 'event_id',
    ];

    protected $dates = [
        'availableAt',
        'unavailableAt',
    ];

    /**
     * Get event
     *
     * @return belongsTo
     */
    public function event() {
        return $this->belongsTo('Tikematic\Models\Event');
    }

    /**
     * Scope a query to only include available tickets.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAvailableAtThisTime($query)
    {
        return $query->where('availableAt', '<', Carbon::now())
            ->where('unavailableAt', '>', Carbon::now());
    }

    /**
     * Scope a query to only include visitor tickets.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeVisitorTicket($query)
    {
        return $query->where('is_seatable', false);
    }

    /**
     * Scope a query to only include gamer tickets.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGamerTickets($query)
    {
        return $query->where('is_seatable', true);
    }
}
