<?php

namespace Domain\Events;

use Illuminate\Database\Eloquent\Model;
use Domain\Events\Collections\EventCollection;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'location',
        'url',
        'date',
        'is_visible',
        'is_featured',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    public $dates = [
        'date',
    ];

    /**
     * Get attribute for route-model binding.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Create a new Eloquent Collection instance.
     *
     * @param  array  $models
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function newCollection(array $models = [])
    {
        return new EventCollection($models);
    }

    /**
     * Get users the event is associated with.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('Domain\Users\User');
    }

    /**
     * Get orders for an event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('Domain\Orders\Order');
    }

    /**
     * Get maps for an event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function maps()
    {
        return $this->hasMany('Domain\Maps\Map');
    }

    /**
     * Get tickets for an event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('Domain\Tickets\Ticket');
    }

    /**
     * Filter featured events.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', 1);
    }

    /**
     * Checks wether the event has active maps.
     *
     * @return bool
     */
    public function hasActiveMaps()
    {
        return $this->maps()->where('active', true)->count() > 0;
    }
}
