<?php

namespace App\Traits;

trait ModelTableNameTrait
{
    public static function name() {
        return with(new static)->getTable();
    }
}
