<?php

namespace App\Repositories\Eloquent;

use App\Models\Seat;
use App\Repositories\RepositoryAbstract;
use App\Repositories\Contracts\SeatRepository;

class EloquentSeatRepository extends RepositoryAbstract implements SeatRepository
{
    public function entity()
    {
        return Seat::class;
    }

    /**
     * Is given seat available.
     *
     * @return boolean;
     */
    public function isAvailable($id)
    {
        return ($this->entity->where('id', $id)->status('available')->count() > 0) ? true : false;
    }
}
