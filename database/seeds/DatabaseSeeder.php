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
use App\Models\Session;
use App\Models\Semester;
use App\Models\Chargeable;
use App\Models\ChargeableService;
use App\Models\ProgramCredit;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;

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

        $deanUser = $this->createDean($school);

        $staff = $this->createStaff($deanUser, $school);

        $faculty = $this->createFaculty($school, $staff);

        $department = $this->createDepartment($faculty, $staff);

        $program = $this->createProgram($department);

        factory(User::class, 3)->create()->each(function ($user) use ($program) {
            $this->createStudent($user, $program);
        });

        $semesterTypes = new Collection();
        $sessions = new Collection();
        $levels = new Collection();
        $courses = new Collection();
        $programCredits = new Collection();
        $semesters = new Collection();

        for ($i = 100; $i <= 400; $i+=100) {
            $level = $this->createLevel($school, "${i}L");
            $levels->push($level);
        }

        $sessions->push($this->createSession($school, Carbon::now(), Carbon::now()->addDays(365)));
        $sessions->push($this->createSession($school, Carbon::now()->addDays(365), Carbon::now()->addDays(730)));

        $types = [
            '1st Semester',
            '2nd Semester'
        ];
        foreach ($types as $name) {
            $type = $this->createSemesterType($school, $name);

            $school->departments()->get()->each(function ($department) use ($school, $type, $courses) {
                $school->levels()->get()->map(function ($level) use ($department, $type, $courses) {
                    $course = $this->createCourse($department, $type, $level);
                    $this->createCourseDependencies($course, $courses);
                    $courses->push($course);
                });
            });
            $semesterTypes->push($type);
        }

        $sessions->slice(0, 1)->each(function ($session) use ($semesterTypes, $semesters, $school, $program) {
            $session->start_date = Carbon::parse($session->start_date);
            $semesterTypes->each(function ($type) use ($session, $semesters, $school, $program) {
                $semester = null;
                if ($type->name == '1st Semester') {
                    $semester = $this->createSemester($session, $type, $session->start_date, $session->start_date->copy()->addDays(180));
                }
                else {
                    $semester = $this->createSemester($session, $type, $session->start_date->copy()->addDays(185), $session->start_date->copy()->addDays(365));
                }
                $this->createChargeableService($school, $semester, "$type->name Fees", 500);
                $semesters->push($semester);
            });
            $this->createChargeableService($school, $session, "$session->name Fees", 1000);
        });

        $levels->each(function ($level) use ($program, $semesters) {
            $credit = $this->createProgramCredit($program, $semesters->first(), $level);
        });
        
        return $user;
    }

    public function createDean(School $school) {
        $deanUser = $this->createUser([
            'first_name' => 'Dean',
            'last_name' => 'Daniels',
            'email' => 'dean.daniel@mailinator.com'
        ]);

        return $deanUser;
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

    public function createStaff(User $user, School $school, Department $department = null) {
        $opts = [
            'user_id' => $user->id,
            'school_id' => $school->id,
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
        return factory(Course::class, 1)->create($opts)->first();
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

    public function createSession(School $school, Carbon $start_date, Carbon $end_date) {
        $opts = [
            'school_id' => $school->id,
            'start_date' => $start_date->startOfDay(),
            'end_date' => $end_date->startOfDay(),
            'name' => "$start_date->year/$end_date->year"
        ];
        return Session::where($opts)->first() ?? Session::create($opts);
    }

    public function createSemester(Session $session, SemesterType $type, Carbon $start_date, Carbon $end_date) {
        $opts = [
            'semester_type_id' => $type->id,
            'session_id' => $session->id,
            'start_date' => $start_date->startOfDay(),
            'end_date' => $end_date->startOfDay()
        ];
        return Semester::where($opts)->first() ?? Semester::create($opts);
    }

    public function createChargeableService(School $school, $model, $name, $amount) {
        $opts = [
            'school_id' => $school->id,
            'type'      => get_class($model),
            'name'      => $name,
            'amount'    => $amount
        ];
        $service = ChargeableService::where($opts)->first() ?? ChargeableService::create($opts);
        $this->createChargeable($service, $model->id, $amount);
        return $service;
    }

    public function createChargeable(ChargeableService $service, $id, $amount) {
        $opts = [
            'chargeable_service_id' => $service->id,
            'owner_id'      => $id,
            'amount'    => $amount
        ];
        return Chargeable::where($opts)->first() ?? Chargeable::create($opts);
    }

    public function createCourseDependencies(Course $course, Collection $dependencies) {
        if ($course->semesterType()->first()->name == '2nd Semester') {
            $ids = $dependencies->filter(function ($dependency) {
                return $dependency->semesterType()->first()->name == '1st Semester';
            })->pluck('id');
            $course->dependencies()->sync($ids);
        }
    }

    public function createProgramCredit(Program $program, Semester $semester, Level $level) {
        $opts = [
            'program_id' => $program->id,
            'semester_id' => $semester->id,
            'level_id' => $level->id
        ];
        return ProgramCredit::where($opts)->first() ?? factory(ProgramCredit::class, 1)->create($opts);
    }
}
