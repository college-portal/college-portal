<?php

namespace App\Models;

use App\User;
use App\Models\Intent;

/**
 * App\Models\IntentType
 * 
 * An IntentType represents a group of intents.
 *
 * @property int $id
 * @property int $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\IntentType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\IntentType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\IntentType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\IntentType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class IntentType extends BaseModel
{

    protected $fillable = [ 'name' ];

    public function users() {
        return $this->hasManyThrough(User::class, Intent::class, 'id', 'intent_type_id')->withTimestamps();
    }

    public function intents() {
        return $this->hasMany(Intent::class, 'intent_type_id');
    }
}
