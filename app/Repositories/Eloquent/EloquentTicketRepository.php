<?php

namespace Tikematic\Repositories\Eloquent;

use Tikematic\Models\Ticket;
use Tikematic\Repositories\RepositoryAbstract;
use Tikematic\Repositories\Contracts\TicketRepository;

class EloquentTicketRepository extends RepositoryAbstract implements TicketRepository
{
    public function entity()
    {
        return Ticket::class;
    }
}
