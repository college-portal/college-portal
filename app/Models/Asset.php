<?php

namespace App\Models;

use App\Models\BaseModel;

/**
 * App\Models\Asset
 *
 * @property int $id
 * @property int $owner_id
 * @property int $asset_type_id
 * @property string $location
 * @property string $mime
 * @property int $size
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Asset whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Asset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Asset whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Asset extends BaseModel
{
    protected $fillable = ['owner_id', 'asset_type_id', 'location', 'mime', 'size'];  
}
