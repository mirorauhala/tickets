<?php

namespace App\Repositories\Eloquent;

use Domain\Tickets\Ticket;
use App\Repositories\RepositoryAbstract;
use App\Repositories\Contracts\TicketRepository;

class EloquentTicketRepository extends RepositoryAbstract implements TicketRepository
{
    public function entity()
    {
        return Ticket::class;
    }

    /**
     * Is given ticket purchasable.
     *
     * @param int $id
     * @return boolean;
     */
    public function isPurchasable($id)
    {
        return ($this->entity->where('id', $id)->purchasable()->count() > 0) ? true : false;
    }
}
