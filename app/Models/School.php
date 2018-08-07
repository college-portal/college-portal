<?php

namespace App\Models;

use App\Models\BaseModel;
use App\User;
use App\Models\Role;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\UserHasRole;
use App\Models\SemesterType;
use App\Models\Level;
use App\Models\Session;
use App\Models\Staff;
use App\Models\GradeType;
use App\Models\ImageType;
use App\Models\ContentType;
use App\Models\Invite;
use App\Models\ChargeableService;
use Carbon\Carbon;

/**
 * App\Models\School
 * 
 * A School represents a tertiary institution.
 *
 * @property int $id
 * @property string $name
 * @property string $short_name
 * @property int $owner_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\School whereContains($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\School whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\School whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\School whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\School whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class School extends BaseModel
{

    protected $fillable = [ 'name', 'short_name', 'owner_id' ];

    public function owner() {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function users() {
        return $this->belongsToMany(User::class, UserHasRole::name())->withTimestamps();
    }

    public function faculties() {
        return $this->hasMany(Faculty::class);
    }

    public function gradeTypes() {
        return $this->hasMany(GradeType::class);
    }

    public function chargeableServices() {
        return $this->hasMany(ChargeableService::class);
    }

    public function imageTypes() {
        return $this->hasMany(ImageType::class);
    }

    public function contentTypes() {
        return $this->hasMany(ContentType::class);
    }

    public function invites() {
        return $this->hasMany(Invite::class);
    }

    public function scopeDepartments() {
        $ids = $this->faculties()->pluck('id');
        return Department::whereIn('faculty_id', $ids);
    }

    public function currentSession($date = null) {
        $date = $date ?? Carbon::now();
        return $this->sessions()->where([
            [ 'start_date', '<=', $date ],
            [ 'end_date', '>=', $date ]
        ]);
    }

    public function sessions() {
        return $this->hasMany(Session::class);
    }

    public function semesterTypes() {
        return $this->hasMany(SemesterType::class);
    }

    public function levels() {
        return $this->hasMany(Level::class);
    }

    public function staff() {
        return $this->hasMany(Staff::class);
    }

    public static function boot() {
        $schoolOwnerRoleCreate = function ($model) {
            /** create school-owner user role */
            if ($model->owner_id) {
                $role = Role::where('name', Role::SCHOOL_OWNER)->first();
                $model->owner->roles()->syncWithoutDetaching([
                    $role->id => [
                        'school_id' => $model->id
                    ]
                ]);
            }
        };

        self::created($schoolOwnerRoleCreate);
        self::updated($schoolOwnerRoleCreate);

        self::deleting(function ($model) {
            $model->users()->detach();
            $model->faculties()->get()->map(function ($faculty) {
                $faculty->delete();
            });
            $model->staff()->get()->map(function ($staff) {
                $staff->delete();
            });
            $model->levels()->get()->map(function ($level) {
                $level->delete();
            });
            $model->sessions()->get()->map(function ($session) {
                $session->delete();
            });
            $model->semesterTypes()->get()->map(function ($type) {
                $type->delete();
            });
            $model->chargeableServices()->get()->map(function ($service) {
                $service->delete();
            });
            $model->gradeTypes()->get()->map(function ($gradeType) {
                $gradeType->delete();
            });
            $model->imageTypes()->get()->map(function ($imageType) {
                $imageType->delete();
            });
            $model->contentTypes()->get()->map(function ($contentType) {
                $contentType->delete();
            });
            $model->invites()->get()->map(function ($invite) {
                $invite->delete();
            });
        });
    }
}
