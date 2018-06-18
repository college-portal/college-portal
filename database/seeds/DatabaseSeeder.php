<?php

use Illuminate\Database\Seeder;
use App\Models\School;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\Program;
use App\Models\Staff;
use App\Models\Role;
use App\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $owner = $this->createSchoolOwner();
    }

    public function createSchoolOwner() {
        $user = $this->createUser([
            'first_name' => 'Owner',
            'last_name' => 'Orlando',
            'email' => 'owner.orlando@mailinator.com'
        ]);

        $this->addRole($user, 'admin');
        
        $school = $this->createSchool($user);

        $this->createDean($school);

        return $user;
    }

    public function createDean(School $school) {
        $deanUser = $this->createUser([
            'first_name' => 'Dean',
            'last_name' => 'Daniels',
            'email' => 'dean.daniel@mailinator.com'
        ]);

        $staff = $this->createStaff($deanUser);

        $faculty = $this->createFaculty($school, $staff);

        $department = $this->createDepartment($faculty, $staff);
    }

    public function createUser($opts = null) {
        return User::where($opts ?? [])->first() ?? factory(User::class, 1)->create($opts ?? [])->first();
    }

    public function addRole(User $user, $roleName) {
        $role = Role::where([
            'name' => $roleName
        ])->first();
        $user->roles()->syncWithoutDetaching($role->id);
        return $user->roles()->get();
    }

    public function createSchool(User $user) {
        $opts = [
            'owner_id' => $user->id,
            'is_active' => true
        ];
        $this->addRole($user, 'school-owner');
        return School::where($opts)->first() ?? factory(School::class, 1)->create($opts)->first();
    }

    public function createStaff(User $user, Department $department = null) {
        $opts = [
            'user_id' => $user->id,
            'department_id' => optional($department)->id
        ];

        $this->addRole($user, 'staff');

        return Staff::where($opts)->first() ?? factory(Staff::class, 1)->create($opts)->first();
    }

    public function createFaculty(School $school, Staff $staff) {
        $opts = [
            'dean_id' => $staff->id,
            'school_id' => $school->id
        ];
        return Faculty::where($opts)->first() ?? factory(Faculty::class, 1)->create($opts)->first();
    }

    public function createDepartment(Faculty $faculty, Staff $staff) {
        $opts = [
            'hod_id' => $staff->id,
            'faculty_id' => $faculty->id
        ];
        return Department::where($opts)->first() ?? factory(Department::class, 1)->create($opts)->first();
    }
}
