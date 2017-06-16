<?php

namespace Tikematic\Models;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
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
    public function orderItem() {
        return $this->belongsTo('Tikematic\Models\OrderItem');
    }

    /**
     * Scope a query to only include seats that are available.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAvailable($query)
    {
        return $query->where('status', '=', 'available');
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
