<?php

namespace App\Models;

use App\Traits\FilterableTrait;
use App\Traits\ContentableTrait;
use App\Traits\AssetableTrait;
use App\Traits\ImageableTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BaseModel
 * 
 * The base class for all other models
 *
 * @mixin \Eloquent
 */
class BaseModel extends Model
{
    use FilterableTrait, ContentableTrait, AssetableTrait, ImageableTrait;
  
    /**
     * Returns the table name for the Model
     *
     * @return string
     */
    public static function name() {
        return with(new static)->getTable();
    }
}