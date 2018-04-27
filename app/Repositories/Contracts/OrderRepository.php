<?php

namespace App\Repositories\Contracts;

interface OrderRepository
{
    public function findByReference($reference);

    public function deleteByReference($reference);
}
