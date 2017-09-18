<?php

namespace Tikematic\Repositories\Eloquent\Criteria;

use Tikematic\Repositories\Criteria\CriterionInterface;

class TicketsCheapestFirst implements CriterionInterface
{
    public function apply($entity)
    {
        return $entity->orderBy("price", "asc");
    }
}
