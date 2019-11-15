<?php

namespace App\Repositories\Contracts;

interface TicketRepository
{
    public function isPurchasable($id);
}
