<?php

namespace App\Models;

use App\User;
use App\Models\IntentType;

/**
 * App\Models\Intent
 * 
 * An Intent represents an intention of a user to perform some action 
 *  in the future, such as "change-password". Each belongs to a particular Intent Type.
 *
 * @property int $id
 * @property int $user_id
 * @property int $intent_type_id
 * @property string $extras
 * @property \Carbon\Carbon $resolved_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Intent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Intent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Intent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Intent extends BaseModel
{
    public const CHANGE_PASSWORD = 'change-password';

    protected $fillable = [ 'user_id', 'intent_type_id', 'extras' ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function type() {
        return $this->belongsTo(IntentType::class, 'intent_type_id');
    }

    public function setExtrasAttribute($value) {
        if (!is_string($value)) {
            $this->attributes['extras'] = json_encode($value);
        }
        else {
            $this->attributes['extras'] = $value;
        }
    }
}
