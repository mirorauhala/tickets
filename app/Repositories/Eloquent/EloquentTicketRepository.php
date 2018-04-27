<?php

namespace App\Repositories\Eloquent;

use App\Models\Ticket;
use App\Repositories\Contracts\TicketRepository;
use App\Repositories\RepositoryAbstract;

class EloquentTicketRepository extends RepositoryAbstract implements TicketRepository
{
    public function entity()
    {
        return Ticket::class;
    }

    /**
     * Is given ticket purchasable.
     *
     * @return boolean;
     */
    public function isPurchasable($id)
    {
        return ($this->entity->where('id', $id)->purchasable()->count() > 0) ? true : false;
    }
}
