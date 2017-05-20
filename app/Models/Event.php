<?php

namespace Tikematic\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'location', 'details', 'url', 'currency', 'is_visible',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Get event's customers.
     *
     * @return belongsToMany
     */
    public function customers() {
        return $this->belongsToMany('Tikematic\Models\User', 'customers');
    }

    /**
     * Get event's maps.
     *
     * @return belongsToMany
     */
    public function maps() {
        return $this->hasMany('Tikematic\Models\Map');
    }

    /**
     * Get event's tickets.
     *
     * @return belongsToMany
     */
    public function tickets() {
        return $this->hasMany('Tikematic\Models\Ticket');
    }

    /**
     * Get event's tournaments.
     *
     * @return belongsToMany
     */
    public function tournaments() {
        return $this->belongsToMany('Tikematic\Models\Tournament');
    }
}
