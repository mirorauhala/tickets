<?php

namespace App\Repositories\Contracts;

interface SeatRepository
{
    public function isAvailable($id);
}
