<?php

namespace App\Models;

use App\Traits\FilterableTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BaseModel
 *
 * @mixin \Eloquent
 */
class BaseModel extends Model
{
    use FilterableTrait;
  
    public static function name() {
        return with(new static)->getTable();
    }
}