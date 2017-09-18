<?php

namespace Tikematic\Repositories\Eloquent;

use Tikematic\Models\Order;
use Tikematic\Repositories\RepositoryAbstract;
use Tikematic\Repositories\Contracts\OrderRepository;

class EloquentOrderRepository extends RepositoryAbstract implements OrderRepository
{
    public function entity()
    {
        return Order::class;
    }

    /*
    * Find Order by reference.
    * @returns Tikematic\Models\Order
    */
    public function findByReference($reference)
    {
        return $this->findWhereFirst('reference', $reference);
    }

    /*
    * Delete order by reference.
    * @returns mixed
    */
    public function deleteByReference($reference)
    {
        return $this->deleteWhere('reference', $reference);
    }
}
