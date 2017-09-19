<?php

namespace Tikematic\Models;

use Illuminate\Database\Eloquent\Model;
use Tikematic\Traits\Eloquent\SeatAvailable;

class Seat extends Model
{
    use SeatAvailable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'status', 'top', 'left', 'event_id', 'user_id', 'ticket_id',
    ];

    /**
     * Scope a query to only include seats that are of a given status.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', '=', $status);
    }

    /**
     * Get seat's order item.
     *
     * @return belongsToMany
     */
    public function orderItem()
    {
        return $this->belongsTo('Tikematic\Models\OrderItem');
    }

    /**
     * Scope a query to only include seats that are available or taken.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAvailableOrTaken($query)
    {
        return $query->where('status', '=', 'available')
            ->orWhere('status', '=', 'taken');
    }

    /**
     * Scope a query to only include seats that are of a given ticket type.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTicketType($query, $type)
    {
        return $query->where('ticket_id', '=', $type);
    }
}
