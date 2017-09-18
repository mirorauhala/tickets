<?php

namespace Tikematic\Repositories\Eloquent\Criteria;

use Carbon\Carbon;
use Tikematic\Repositories\Criteria\CriterionInterface;

class TicketsAvailable implements CriterionInterface
{
    public function apply($entity)
    {
        return $entity->where('availableAt', '<', Carbon::now())
            ->where('unavailableAt', '>', Carbon::now());
        ;
    }
}
