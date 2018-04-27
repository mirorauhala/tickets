<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Ticket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'vat',
        'reserved',
        'maxAmountPerTransaction',
        'availableAt',
        'unavailableAt',
        'is_seatable',
        'event_id',
    ];

    protected $dates = [
        'availableAt',
        'unavailableAt',
    ];

    /**
     * Get event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

    /**
     * Scope a query to only include visitor tickets.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
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
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGamerTickets($query)
    {
        return $query->where('is_seatable', true);
    }

    /**
     * Return only purchasable tickets.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePurchasable($query)
    {
        return $query->where('availableAt', '<', Carbon::now())
            ->where('unavailableAt', '>', Carbon::now());
    }

    /**
     * Order by price.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string                                $order
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrderByPrice($query, $order = 'asc')
    {
        return $query->orderBy('price', $order);
    }
}
