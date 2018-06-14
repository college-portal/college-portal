<?php

use Illuminate\Database\Seeder;
use App\Models\School;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\Program;
use App\Models\Staff;
use App\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $owner = $this->createSchoolOwner();
    }

    public function createSchoolOwner() {
        $user = $this->createUser([
            'first_name' => 'School',
            'last_name' => 'Owner'
        ]);
        
        $school = $this->createSchool($user);

        $deanUser = $this->createUser([
            'first_name' => 'Dean',
            'last_name' => 'Daniels'
        ]);

        $staff = $this->createStaff($deanUser);

        $faculty = $this->createFaculty($school, $staff);

        $department = $this->createDepartment($faculty, $staff);

        return $user;
    }

    public function createUser($opts = null) {
        return factory(User::class, 1)->create($opts ?? [])->first();
    }

    public function createSchool(User $user) {
        return factory(School::class, 1)->create([
            'owner_id' => $user->id
        ])->first();
    }

    public function createStaff(User $user, Department $department = null) {
        return factory(Staff::class, 1)->create([
            'user_id' => $user->id,
            'department_id' => optional($department)->id
        ])->first();
    }

    public function createFaculty(School $school, Staff $staff) {
        return factory(Faculty::class, 1)->create([
            'dean_id' => $staff->id,
            'school_id' => $school->id
        ])->first();
    }

    public function createDepartment(Faculty $faculty, Staff $staff) {
        return factory(Department::class, 1)->create([
            'hod_id' => $staff->id,
            'faculty_id' => $faculty->id
        ])->first();
    }
}
