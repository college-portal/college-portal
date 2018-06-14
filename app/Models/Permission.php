<?php

namespace App\Models;

use App\Models\BaseModel;

use App\Models\Role;
use App\Models\RoleHasPermission;

/**
 * App\Models\Permission
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Action whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Action whereName($value)
 * @mixin \Eloquent
 */
class Permission extends BaseModel
{
    public function role() {
        return $this->belongsToMany(Role::class, RoleHasPermission::name());
    }
}
