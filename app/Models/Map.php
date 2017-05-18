<?php

namespace Tikematic;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
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
        return $this->hasMany('Tikematic\Seat');
    }

    /**
     * Scope a query to only include active maps.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', '=', true);
    }
}
