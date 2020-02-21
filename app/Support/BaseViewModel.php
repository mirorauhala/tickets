<?php

namespace Support;

use Illuminate\Contracts\Support\Arrayable;

abstract class BaseViewModel implements Arrayable {
    /**
     * Get object properties as an array.
     *
     * @return array
     */
    public function toArray() : array {
        return \get_object_vars($this);
    }
}
