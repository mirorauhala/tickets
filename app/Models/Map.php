<?php

namespace Tikematic\Models;

use Illuminate\Database\Eloquent\Model;
use Tikematic\Traits\Eloquent\IsActive;

class Map extends Model
{
    use IsActive;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'active', 'event_id',
    ];

    /**
     * Get events seats.
     *
     * @return belongsToMany
     */
    public function seats() {
        return $this->hasMany('Tikematic\Models\Seat');
    }
}
