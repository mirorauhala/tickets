<?php

namespace Tikematic\Repositories\Eloquent;

use Tikematic\Models\Seat;
use Tikematic\Repositories\RepositoryAbstract;
use Tikematic\Repositories\Contracts\SeatRepository;

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
