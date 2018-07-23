<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Content;
use App\Models\School;

/**
 * App\Models\ContentType
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property string $display_name
 * @property int school_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContentType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContentType whereName($value)
 * @mixin \Eloquent
 */

class ContentType extends BaseModel
{
    protected $fillable = [ 'type', 'name', 'display_name', 'school_id' ];

    public function contents()
    {
        return $this->hasMany(Content::class, 'content_type_id');
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
