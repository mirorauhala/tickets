<?php

namespace App\Repositories\Eloquent;

use Domain\OrderItems\OrderItem;
use App\Repositories\RepositoryAbstract;
use App\Repositories\Contracts\OrderItemRepository;

class EloquentOrderItemRepository extends RepositoryAbstract implements OrderItemRepository
{
    public function entity()
    {
        return OrderItem::class;
    }

    /**
     * Find order by barcode.
     *
     * @return Domain\Orders\Order
     */
    public function findByBarcode($barcode)
    {
        return $this->findWhereFirst('barcode', $barcode);
    }

    /**
     * Delete order by barcode.
     *
     * @return mixed
     */
    public function deleteByBarcode($barcode)
    {
        return $this->deleteWhere('barcode', $barcode);
    }

    /**
     * Is given ticket purchasable.
     *
     * @return boolean;
     */
    public function seatSelectable($id)
    {
        return ($this->entity->find($id)->status('paid')->emptySeat()->count() > 0) ? true : false;
    }
}
