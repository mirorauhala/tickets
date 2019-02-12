<?php

namespace App\Models;

use App\Traits\Eloquent\IsActive;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use IsActive;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'active',
        'event_id',
    ];

    /**
     * Get events seats.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seats()
    {
        return $this->hasMany('App\Models\Seat');
    }
}
