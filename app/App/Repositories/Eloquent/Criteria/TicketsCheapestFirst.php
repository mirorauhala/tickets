<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\CriterionInterface;

class TicketsCheapestFirst implements CriterionInterface
{
    public function apply($entity)
    {
        return $entity->orderBy('price', 'asc');
    }
}
