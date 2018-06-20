<?php

namespace App\Models;

use App\Models\BaseModel;

/**
 * App\Models\Level
 *
 * @property int $id
 * @property string $name
 * @property int $school_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Level whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Level whereName($value)
 * @mixin \Eloquent
 */
class Level extends BaseModel
{
    protected $fillable = [ 'name', 'school_id' ];
}
