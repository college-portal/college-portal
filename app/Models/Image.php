<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\ImageType;

/**
 * App\Models\Image
 * 
 * An Image represents a particular jpeg/png/etc resource belonging to an Image Type
 *
 * @property int $id
 * @property int $owner_id
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
    protected $fillable = [ 'owner_id', 'image_type_id' ];

    public function type() {
        return $this->belongsTo(ImageType::class, 'image_type_id');
    }

    public function scopeOwner() {
        return app($this->type()->first()->type)->where('id', $this->owner_id);
    }

    public function scopeSchool() {
        $ids = $this->type()->pluck('school_id');
        return School::whereIn('id', $ids);
    }
}
