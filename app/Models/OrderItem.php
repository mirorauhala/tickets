<?php

namespace Tikematic\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'barcode', 'value', 'status', 'release_lock_after', 'ticket_id', 'user_id', 'order_id', 'seat_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Get items ticket.
     *
     * @return hasMany
     */
    public function ticket() {
        return $this->belongsTo('Tikematic\Models\Ticket');
    }

    /**
     * Get item's seat.
     *
     * @return hasMany
     */
    public function seat() {
        return $this->belongsTo('Tikematic\Models\Seat');
    }

    /**
     * Get item's order.
     *
     * @return hasMany
     */
    public function order() {
        return $this->belongsTo('Tikematic\Models\Order');
    }

    /**
     * Scope a query to only include order items that are paid or pending.
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
     * Scope a query to only include order items that are paid.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePaid($query)
    {
        return $query->where('status', '=', "paid");
    }

    /**
     * Scope a query to only include order items that are pending.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePending($query)
    {
        return $query->where('status', '=', "pending");
    }

    /**
     * Scope a query to only include order items that are unassigned.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnassigned($query)
    {
        return $query->where('status', '=', "unassigned");
    }

    /**
     * Scope a query to only include order items that are exceeding their lock.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExceedingLockTime($query)
    {
        return $query->where('release_lock_after', '<', Carbon::now());
    }
}
