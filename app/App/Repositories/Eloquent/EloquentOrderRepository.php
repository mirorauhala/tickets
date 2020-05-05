<?php

namespace App\Repositories\Eloquent;

use Domain\Orders\Order;
use App\Repositories\RepositoryAbstract;
use App\Repositories\Contracts\OrderRepository;

class EloquentOrderRepository extends RepositoryAbstract implements OrderRepository
{
    public function entity()
    {
        return Order::class;
    }

    /**
     * Find Order by reference.
     *
     * @return Domain\Orders\Order
     */
    public function findByReference($reference)
    {
        return $this->findWhereFirst('reference', $reference);
    }

    /**
     * Delete order by reference.
     *
     * @return mixed
     */
    public function deleteByReference($reference)
    {
        return $this->deleteWhere('reference', $reference);
    }
}
