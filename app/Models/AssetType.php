<?php

namespace App\Models;

use App\Models\BaseModel;

/**
 * App\Models\AssetType
 *
 * @property int $id
 * @property int $school_id
 * @property string $type
 * @property string $name
 * @property int $size
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AssetType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AssetType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AssetType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AssetType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AssetType extends BaseModel
{
    protected $fillable = [ 'type', 'name', 'school_id' ];

    public function assets() {
        return $this->hasMany(Asset::class, 'asset_type_id');
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function scopeOwner($query, $owner_id)
    {
        return app($this->type)->where('id', $owner_id);
    }
}
