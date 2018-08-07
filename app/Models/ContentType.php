<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Content;
use App\Models\School;
use App\Traits\ModelContentTypeTrait;

/**
 * App\Models\ContentType
 * 
 * Description:
 *  Content Types are a way to extend the properties of any model, 
 *    without needed to write a migration.
 *  A Content Type represents an extension of a model, 
 *   denoted by the $type property. 
 * 
 * E.g. A User model can have a content-type called "phone" which has an "string" format.
 * 
 * ContentType Formats:
 * 
 * A Content Type can take one of many formats, including:
 * 
 * - string: its content value must be a string
 * - number: its content value must be a number
 * - boolean: its content value must resolve to true/false
 * - datetime: its content value must resolve to a datetime
 * - array: can have multiple contents
 * - object: can have child content-types
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
        parent::boot();
        self::creating(function ($model) {
            if ($model->related_to) {
                $parent = $model->parent()->first();
                if (!$parent) throw \Exception("no parent exists for content_type $model");
                if ($parent->format != self::OBJECT) throw \Exception("only content_type with format 'object' can have children");
                $model->type = $parent->type;
            }
        });
        self::deleting(function ($model) {
            $model->children()->get()->map(function ($contentType) {
                $contentType->delete();
            });
            $model->contents()->get()->map(function ($content) {
                $content->delete();
            });
        });
    }
}
