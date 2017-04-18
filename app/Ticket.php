<?php

namespace Tikematic;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'vat', 'currency', 'standalone', 'event_id'
    ];
}
