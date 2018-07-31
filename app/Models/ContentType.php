<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Content;
use App\Models\School;
use App\Traits\ModelContentTypeTrait;

/**
 * App\Models\ContentType
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property string $display_name
 * @property string $format
 * @property int school_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContentType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ContentType whereName($value)
 * @mixin \Eloquent
 */

class ContentType extends BaseModel
{
    use ModelContentTypeTrait;

    const STRING = 'string';
    const BOOLEAN = 'boolean';
    const NUMBER = 'number';
    const DATETIME = 'datetime';
    const OBJECT = 'object';
    const ARRAY = 'array';

    protected $fillable = [ 'type', 'name', 'display_name', 'format', 'school_id' ];

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

    public function parent() {
        return $this->belongsTo(self::class, 'related_to');
    }

    public function children() {
        return $this->hasMany(self::class, 'related_to');
    }

    public static function boot() {
        self::creating(function ($model) {
            if ($model->related_to) {
                $parent = $model->parent()->first();
                if (!$parent) throw \Exception("no parent exists for content_type $model");
                if ($parent->format != self::OBJECT) throw \Exception("only content_type with format 'object' can have children");
                $model->type = $parent->type;
            }
        });
    }
}
