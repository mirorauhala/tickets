<?php

namespace Tikematic\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference', 'currency', 'value', 'vat', 'status', 'payer_name', 'release_lock_after', 'event_id', 'user_id',
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
     * Get event
     *
     * @return belongsTo
     */
    public function event() {
        return $this->belongsTo('Tikematic\Models\Event');
    }

    /**
     * Get order's items e.g. tickets.
     *
     * @return belongsToMany
     */
    public function items() {
        return $this->hasMany('Tikematic\Models\OrderItem');
    }

    /**
     * Scope a query to only include orders that are pending.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePending($query)
    {
        return $query->where('status', '=', "pending");
    }

    /**
     * Scope a query to only include orders that are exceeding their lock.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExceedingLockTime($query)
    {
        return $query->where('release_lock_after', '<', Carbon::now());
    }

}
