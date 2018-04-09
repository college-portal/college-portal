<?php

namespace App\Models;

use App\Models\BaseModel;

use App\Models\Role;

/**
 * App\Models\Permission
 *
 * @property int $id
 * @property string $name
 * @property int role_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Action whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Action whereName($value)
 * @mixin \Eloquent
 */
class Permission extends BaseModel
{
    public function role() {
        return $this->belongsTo(Role::class);
    }
}
