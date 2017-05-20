<?php

namespace Tikematic\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'value', 'status', 'ticket_id', 'event_id', 'user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

}
