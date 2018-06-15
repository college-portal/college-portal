<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\ImageType;

/**
 * App\Models\Image
 *
 * @property int $id
 * @property int $owner_id
 * @property int $owner_type
 * @property int $image_type_id
 * @property string $location
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Image extends BaseModel
{
    public function type() {
        return $this->belongsTo(ImageType::class);
    }

    public function owner() {
        return $this->belongsTo($this->owner_type, 'owner_id');
    }
}
