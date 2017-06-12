<?php

namespace Tikematic\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'barcode', 'value', 'status', 'release_lock_after', 'sleeps', 'airmattress', 'ticket_id', 'user_id', 'order_id',
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
}
