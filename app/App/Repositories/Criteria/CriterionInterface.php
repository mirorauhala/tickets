<?php

namespace App\Repositories\Criteria;

interface CriterionInterface
{
    public function apply($entity);
}
