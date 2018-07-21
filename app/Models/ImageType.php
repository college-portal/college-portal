<?php

namespace App\Models;

use App\Models\Image;
use App\Models\School;
use App\Models\BaseModel;

/**
 * App\Models\ImageType
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property int school_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageType whereName($value)
 * @mixin \Eloquent
 */
class ImageType extends BaseModel
{
    protected $fillable = [ 'type', 'name', 'school_id' ];

    public function images() {
        return $this->hasMany(Image::class, 'image_type_id');
    }

    public function school() {
        return $this->belongsTo(School::class);
    }

    public function scopeOwner($query, $owner_id) {
        return app($this->type)->where('id', $owner_id);
    }

    public static function boot() {
        self::deleting(function ($model) {
            $model->images()->get()->map(function ($image) {
                $image->delete();
            });
        });
    }
}
