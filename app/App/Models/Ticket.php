<?php

namespace App\Models;

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
        'name',
        'price',
        'vat',
        'reserved',
        'maxAmountPerTransaction',
        'availableAt',
        'unavailableAt',
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
        return $this->belongsTo('Domain\Events\Event');
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
