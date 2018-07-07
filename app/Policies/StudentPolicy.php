<?php

namespace App\Policies;

use App\User;
use App\Models\Student;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Student $student) {
        return $user->schools()->where('schools.id', $student->school()->first()->id)->exists();
    }

    public function delete(User $user, Student $student) {
        return $user->hasRole('admin') || 
                ($user->id == $student->program->department->hod->user->id) || 
                ($user->id == $student->program->department->faculty->dean->user->id) || 
                ($user->id == $student->program->department->faculty->school->owner_id);
    }

    public function update(User $user, Student $student) {
        return $user->hasRole('admin') || 
                ($user->id == $student->program->department->hod->user->id) || 
                ($user->id == $student->program->department->faculty->dean->user->id) || 
                ($user->id == $student->program->department->faculty->school->owner_id);
    }
}
