<?php

namespace Tikematic\Repositories\Eloquent;

use Tikematic\Models\OrderItem;
use Tikematic\Repositories\RepositoryAbstract;
use Tikematic\Repositories\Contracts\OrderItemRepository;

class EloquentOrderItemRepository extends RepositoryAbstract implements OrderItemRepository
{
    public function entity()
    {
        return OrderItem::class;
    }

    /*
    * Find order by barcode.
    * @returns Tikematic\Models\Order
    */
    public function findByBarcode($barcode)
    {
        return $this->findWhereFirst('barcode', $barcode);
    }

    /*
    * Delete order by barcode.
    * @returns mixed
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
