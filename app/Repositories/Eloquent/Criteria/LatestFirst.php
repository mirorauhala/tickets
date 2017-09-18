<?php

namespace Tikematic\Repositories\Eloquent\Criteria;

use Tikematic\Repositories\Criteria\CriterionInterface;

class LatestFirst implements CriterionInterface
{
    public function apply($entity)
    {
        return $entity->latest();
    }
}
