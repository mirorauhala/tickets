<?php

namespace App\Repositories\Eloquent\Criteria;

use Carbon\Carbon;
use App\Repositories\Criteria\CriterionInterface;

class TicketsAvailable implements CriterionInterface
{
    public function apply($entity)
    {
        return $entity->purchasable();
    }
}
