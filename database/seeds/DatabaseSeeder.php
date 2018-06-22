<?php

use Illuminate\Database\Seeder;
use App\Models\School;
use App\Models\Student;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\Program;
use App\Models\Staff;
use App\Models\Role;
use App\Models\Level;
use App\Models\Course;
use App\Models\SemesterType;
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

        $types = [
            '1st Semester',
            '2nd Semester'
        ];
        foreach ($types as $name) {
            $type = $this->createSemesterType($school, $name);

            $school->departments()->get()->each(function ($department) use ($school, $type) {
                $courses = $school->levels()->get()->map(function ($level) use ($department, $type) {
                    return $this->createCourse($department, $type, $level);
                });
            });
        }
        
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

        $program = $this->createProgram($department);

        factory(User::class, 3)->create()->each(function ($user) use ($program) {
            $this->createStudent($user, $program);
        });

        for ($i = 100; $i <= 400; $i+=100) {
            $this->createLevel($school, "${i}L");
        }
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
        return School::where($opts)->first() ?? factory(School::class, 1)->create($opts)->first();
    }

    public function createStaff(User $user, Department $department = null) {
        $opts = [
            'user_id' => $user->id,
            'department_id' => optional($department)->id
        ];

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

    public function createCourse(Department $department, SemesterType $type, Level $level, $title = null) {
        $opts = [
            'department_id' => $department->id,
            'semester_type_id' => $type->id,
            'level_id' => $level->id
        ];
        if ($title) {
            $opts['title'] = $title;
        }
        return Course::where($opts)->first() ?? factory(Course::class, 1)->create($opts)->first();
    }

    public function createSemesterType(School $school, $name) {
        return $school->semesterTypes()->firstOrCreate([
            'name' => $name
        ]);
    }

    public function createProgram(Department $department) {
        $opts = [
            'department_id' => $department->id
        ];
        return Program::where($opts)->first() ?? factory(Program::class, 1)->create($opts)->first();
    }

    public function createStudent(User $user, Program $program) {
        $opts = [
            'user_id' => $user->id,
            'program_id' => $program->id
        ];
        return Student::where($opts)->first() ?? factory(Student::class, 1)->create($opts);
    }

    public function createLevel(School $school, $name) {
        $opts = [
            'school_id' => $school->id,
            'name' => $name
        ];
        return Level::where($opts)->first() ?? Level::create($opts);
    }
}
