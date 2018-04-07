<?php

namespace App\Models;

use App\Models\BaseModel;

/**
 * App\Models\UserHasRole
 *
 * @property int $id
 * @property int $user_id
 * @property int $role_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserHasRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserHasRole whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserHasRole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserHasRole whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UserHasRole extends BaseModel
{

}
