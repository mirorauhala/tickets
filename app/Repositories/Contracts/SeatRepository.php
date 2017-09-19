<?php

namespace Tikematic\Repositories\Contracts;

interface SeatRepository
{
    public function isAvailable($id);
}
