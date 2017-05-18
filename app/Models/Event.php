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
        'name', 'location', 'details', 'url',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Get events customers.
     *
     * @return belongsToMany
     */
    public function customers() {
        return $this->belongsToMany('Tikematic\Models\User', 'customers');
    }

    /**
     * Get events maps.
     *
     * @return belongsToMany
     */
    public function maps() {
        return $this->hasMany('Tikematic\Models\Map');
    }

    /**
     * Get events tickets.
     *
     * @return belongsToMany
     */
    public function tickets() {
        return $this->hasMany('Tikematic\Models\Ticket');
    }

    /**
     * Get event tournaments.
     *
     * @return belongsToMany
     */
    public function tournaments() {
        return $this->belongsToMany('Tikematic\Models\Tournament');
    }
}
