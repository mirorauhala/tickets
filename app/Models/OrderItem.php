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
        'title', 'barcode', 'value', 'release_lock_after', 'sleeps', 'airmattress', 'ticket_id', 'user_id', 'order_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];


}
