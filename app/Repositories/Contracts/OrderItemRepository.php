<?php

namespace App\Repositories\Contracts;

interface OrderItemRepository
{
    public function findByBarcode($barcode);
    public function deleteByBarcode($barcode);
}
