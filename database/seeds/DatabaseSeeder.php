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
use App\Models\Payable;
use App\Models\StaffTeachCourse;
use App\Models\StudentTakesCourse;
use App\Models\GradeType;
use App\Models\Grade;
use App\Models\ImageType;
use App\Models\Image;
use App\Models\IntentType;
use App\Models\Intent;
use App\Models\ContentType;
use App\Models\Content;
use App\Models\Invite;
use App\Models\InviteRole;
use App\Models\Prospect;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $owner = $this->createSchoolOwner();
    }

    public function createSchoolOwner() {
        $user = User::where('email', 'owner.orlando@mailinator.com')->exists() ? $this->createUser() : $this->createUser([
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

        $semesterTypes = new Collection();
        $sessions = new Collection();
        $levels = new Collection();
        $courses = new Collection();
        $programCredits = new Collection();
        $semesters = new Collection();
        $chargeableServices = new Collection();
        $chargeables = new Collection();
        $payables = new Collection();
        $staffCourses = new Collection();
        $students = new Collection();
        $gradeTypes = new Collection();
        $studentCourses = new Collection();
        $grades = new Collection();
        $images = new Collection();
        $intentTypes = new Collection();
        $contentTypes = new Collection();

        $this->createGradeType($school, 'A', 5, 70, 100);
        $this->createGradeType($school, 'B', 4, 60, 70);
        $this->createGradeType($school, 'C', 3, 50, 60);
        $this->createGradeType($school, 'D', 2, 45, 50);
        $this->createGradeType($school, 'E', 1, 40, 45);

        $imageType = $this->createImageType($school);
        $formats = new Collection(ContentType::formats());
        $formats->each(function ($format) use ($contentTypes, $school, $user, $department, $staff) {
            $contentType = $this->createContentType($school, $format);
            $contentTypes->push($contentType);

            $owner_id = $this->getContentOwner($contentType, $user, $department, $staff);

            $contents = new Collection();
            $contents->push($this->createContent($contentType, null, $owner_id));

            if ($contentType->format == ContentType::ARRAY) {
                $contents->push($this->createContent($contentType, 'array-value-2', $owner_id));
                $contents->push($this->createContent($contentType, 'array-value-3', $owner_id));
            }
            else if ($contentType->format == ContentType::OBJECT) {
                $this->createContent(
                    $this->createContentType($school, ContentType::STRING, $contentType->id),
                    'object-value-1', $owner_id
                );
                $this->createContent(
                    $this->createContentType($school, ContentType::NUMBER, $contentType->id),
                    123, $owner_id
                );
            }
        });

        $intentTypes->push($this->createIntentType(Intent::CHANGE_PASSWORD));
        $this->createIntent($user, $intentTypes->first());

        $invite = $this->createInvite($school, $user, 'invited.user@mailinator.com');
        $this->createInviteRole($invite, Role::whereName(Role::STAFF)->first()->id);

        $studentUsers = factory(User::class, 3)->create()->map(function ($user) use ($program, $students) {
            $student = $this->createStudent($user, $program);
            $students->push($student);
            return $user;
        });

        $studentUsers->slice(0, 1)->each(function ($user) use ($imageType, $images) {
            $image = $this->createImage($imageType, $user);
            $images->push($image);
        });

        for ($i = 100; $i <= 400; $i+=100) {
            $level = $this->createLevel($school, "${i}L");
            $levels->push($level);
        }

        $sessions->push($this->createSession($school, Carbon::now(), Carbon::now()->addDays(365)));
        $sessions->push($this->createSession($school, Carbon::now()->addDays(365), Carbon::now()->addDays(730)));

        $this->createProspect($this->createUser(), $program, $sessions->first());

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

        $sessions->slice(0, 1)->each(function ($session) use ($semesterTypes, $semesters, $school, $program, $chargeableServices, $chargeables) {
            $session->start_date = Carbon::parse($session->start_date);
            $semesterTypes->each(function ($type) use ($session, $semesters, $school, $program, $chargeableServices, $chargeables) {
                $semester = null;
                if ($type->name == '1st Semester') {
                    $semester = $this->createSemester($session, $type, $session->start_date, $session->start_date->copy()->addDays(180));
                }
                else {
                    $semester = $this->createSemester($session, $type, $session->start_date->copy()->addDays(185), $session->start_date->copy()->addDays(365));
                }
                $service = $this->createChargeableService($school, $semester, "$type->name Fees", 500);
                $chargeable = $this->createChargeable($service, $semester->id, 500);

                $chargeableServices->push($service);
                $chargeables->push($chargeable);
                $semesters->push($semester);
            });
            $service = $this->createChargeableService($school, $session, "$session->name Fees", 1000);
            $chargeable = $this->createChargeable($service, $session->id, 1000);

            $chargeableServices->push($service);
            $chargeables->push($chargeable);
        });

        $levels->slice(0, 3)->each(function ($level) use ($program, $semesters) {
            $credit = $this->createProgramCredit($program, $semesters->first(), $level);
        });

        $chargeables->slice(0, 3)->each(function ($chargeable) use ($user, $payables) {
            $payable = $this->createPayable($chargeable, $user);
            $payables->push($payable);
        });

        $courses->slice(0, 1)->each(function ($course) use ($staff, $staffCourses) {
            $staffCourse = $this->createStaffTeachCourse($staff, $course);
            $staffCourses->push($staffCourse);
        });

        $students->slice(0, 1)->each(function ($student) use ($staffCourses, $semesters, $studentCourses) {
            $studentCourse = $this->createStudentTakesCourse($student, $staffCourses->first(), $semesters->first());
            $studentCourses->push($studentCourse);
        });

        $studentCourses->slice(0, 1)->each(function ($studentCourse) use ($grades) {
            $grade = $this->createGrade($studentCourse);
            $grades->push($grade);
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
        return $opts ? (User::where($opts)->first() ?? factory(User::class, 1)->create($opts ?? [])->first()) : factory(User::class, 1)->create($opts ?? [])->first();
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
            'owner_id' => $user->id
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
        return Student::where($opts)->first() ?? factory(Student::class, 1)->create($opts)->first();
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

    public function createPayable(Chargeable $chargeable, User $user) {
        $opts = [
            'chargeable_id' => $chargeable->id,
            'user_id' => $user->id
        ];
        return Payable::where($opts)->first() ?? Payable::create($opts);
    }

    public function createStaffTeachCourse(Staff $staff, Course $course) {
        $opts = [
            'staff_id' => $staff->id,
            'course_id' => $course->id
        ];
        return StaffTeachCourse::where($opts)->first() ?? StaffTeachCourse::create($opts);
    }

    public function createStudentTakesCourse(Student $student, StaffTeachCourse $staffCourse, Semester $semester) {
        $opts = [
            'student_id' => $student->id,
            'staff_teach_course_id' => $staffCourse->id,
            'semester_id' => $semester->id
        ];
        return StudentTakesCourse::where($opts)->first() ?? StudentTakesCourse::create($opts);
    }

    public function createGradeType(School $school, string $name, int $value, float $minimum, float $maximum) {
        $opts = [
            'school_id' => $school->id,
            'name' => $name,
            'value' => $value,
            'minimum' => $minimum,
            'maximum' => $maximum
        ];
        return GradeType::where($opts)->first() ?? GradeType::create($opts);
    }

    public function createGrade(StudentTakesCourse $studentCourse) {
        $opts = [
            'student_takes_course_id' => $studentCourse->id
        ];
        return Grade::where($opts)->first() ?? factory(Grade::class, 1)->create($opts)->first();
    }

    public function createImageType(School $school) {
        $opts = [
            'school_id' => $school->id
        ];
        return ImageType::where($opts)->first() ?? factory(ImageType::class)->create($opts)->first();
    }

    public function createImage(ImageType $imageType, User $user) {
        $opts = [
            'owner_id' => $user->id,
            'image_type_id' => $imageType->id
        ];
        return Image::where($opts)->first() ?? Image::create($opts);
    }

    public function createIntentType(string $name) {
        $opts = [
            'name' => $name
        ];
        return IntentType::where($opts)->first() ?? IntentType::create($opts);
    }

    public function createIntent(User $user, IntentType $intentType, $extras = []) {
        $opts = [
            'user_id' => $user->id,
            'intent_type_id' => $intentType->id,
            'extras' => json_encode($extras)
        ];
        return Intent::where($opts)->first() ?? Intent::create($opts);
    }

    public function createContentType(School $school, string $format = null, int $related_to = null) {
        $opts = array_merge([
            'school_id' => $school->id,
            'related_to' => $related_to
        ], $format ? [ 'format' => $format ] : []);
        return ContentType::where($opts)->first() ?? factory(ContentType::class)->create($opts);
    }

    function getContentOwner(ContentType $contentType, User $user, Department $department, Staff $staff) {
        return ($contentType->type == Department::class) ? $department->id :
                            ($contentType->type == Staff::class) ? $staff->id : $user->id;
    }

    public function createContent(ContentType $contentType, $value = null, $owner_id = null) {
        switch ($contentType->format) {
            case ContentType::STRING:
                $value = $value ?? 'Value 1';
                break;
            case ContentType::DATETIME:
                $value = Carbon::now()->toDateString();
                break;
            case ContentType::BOOLEAN:
                $value = true;
                break;
            case ContentType::NUMBER:
                $value = 123;
                break;
            case ContentType::OBJECT:
                $value = new \stdClass();
                break;
            case ContentType::ARRAY:
                $value = $value ?? 'array-value-1';
                break;
        }
        $opts = [
            'content_type_id' => $contentType->id,
            'owner_id' => $owner_id,
            'value' => !is_string($value) ? json_encode($value) : $value
        ];
        return Content::where($opts)->first() ?? Content::create($opts)->first();
    }
    public function createInvite(School $school, User $user, string $email) {
        $opts = [
            'school_id' => $school->id,
            'creator_id' => $user->id,
            'email' => $email,
            'message' => 'Please come to my school as a student'
        ];
        return Invite::where($opts)->first() ?? Invite::create($opts)->first();
    }
    public function createInviteRole(Invite $invite, int $role_id) {
        $opts = [
            'invite_id' => $invite->id,
            'role_id' => $role_id,
            'extras' => '{}'
        ];
        return InviteRole::where($opts)->first() ?? InviteRole::create($opts)->first();
    }
    public function createProspect(User $user, Program $program, Session $session) {
        $opts = [
            'user_id' => $user->id,
            'school_id' => $program->school()->first()->id,
            'program_id' => $program->id,
            'session_id' => $session->id
        ];
        return Prospect::where($opts)->first() ?? Prospect::create($opts)->first();
    }
}
