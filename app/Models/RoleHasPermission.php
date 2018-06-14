<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Role;
use App\Models\Permission;

/**
 * App\Models\RoleHasPermission
 *
 * @property int $id
 * @property string $role_id
 * @property string $permission_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleHasPermission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleHasPermission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleHasPermission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RoleHasPermission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RoleHasPermission extends BaseModel
{
    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function permission() {
        return $this->belongsTo(Permission::class);
    }
}
