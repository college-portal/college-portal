<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\ContentType;
use App\Models\School;

/**
 * App\Models\Content
 *
 * @property int $id
 * @property int $owner_id
 * @property int $content_type_id
 * @property string $value
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Content whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Content whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Content whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Content whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Content extends BaseModel
{
    protected $fillable = [ 'owner_id', 'content_type_id', 'value' ];

    public function type()
    {
        return $this->belongsTo(ContentType::class, 'content_type_id');
    }

    public function scopeOwner()
    {
        return app($this->type()->first()->type)->where('id', $this->owner_id);
    }

    public function scopeSchool()
    {
        $ids = $this->type()->pluck('school_id');
        return School::whereIn('id', $ids);
    }
}
