<?php

namespace Tikematic\Repositories\Contracts;

interface TicketRepository
{
    public function isPurchasable($id);
}
