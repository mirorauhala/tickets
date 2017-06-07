<?php

namespace Tikematic\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference', 'currency', 'value', 'vat', 'status', 'payer_name', 'event_id', 'user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Scope a query to only include orders that are of a given status.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', '=', $status);
    }

    /**
     * Scope a query to only include orders that are paid or pending.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePaidOrPending($query)
    {
        return $query->where('status', '=', 'pending')
            ->orWhere('status', '=', 'paid');
    }

    /**
     * Get order's items e.g. tickets.
     *
     * @return belongsToMany
     */
    public function items() {
        return $this->hasMany('Tikematic\Models\OrderItem');
    }

}
