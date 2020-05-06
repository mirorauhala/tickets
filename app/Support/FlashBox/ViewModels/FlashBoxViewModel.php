<?php

namespace Support\FlashBox\ViewModels;

use Illuminate\Contracts\Support\Arrayable;

class FlashBoxViewModel implements Arrayable
{
    public const STATUS_SUCCESS = 'success';

    public function __construct(string $status, string $message)
    {
        $this->flash_status = $status;
        $this->flash_message = $message;
    }

    public function toArray()
    {
        return \get_object_vars($this);
    }
}
