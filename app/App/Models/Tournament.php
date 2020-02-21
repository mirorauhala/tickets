<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'rules',
        'registration_start',
        'registration_end',
        'max_teams',
        'team_min_size',
        'team_max_size',
    ];

    /**
     * Get parent event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function event()
    {
        return $this->belongsTo('Domain\Events\Event');
    }
}
