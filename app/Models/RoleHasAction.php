<?php

namespace App\Models;

use App\Models\BaseModel;

/**
 * App\Models\RoleHasAction
 *
 * @property int $id
 * @property string $role_id
 * @property string $action_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleHasAction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleHasAction whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleHasAction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleHasAction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RoleHasAction extends BaseModel
{

}
