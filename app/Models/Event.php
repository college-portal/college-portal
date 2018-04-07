<?php

namespace App\Models;

use App\Models\BaseModel;

/**
 * App\Models\Event
 *
 * @property int $id
 * @property int $name
 * @property int $user_id
 * @property string $url
 * @property string $description
 * @property \Carbon\Carbon $start_date
 * @property \Carbon\Carbon $end_date
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereName($value)
 * @mixin \Eloquent
 */
class Event extends BaseModel
{

}
