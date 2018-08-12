<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'CollegePortal\Models\School' => 'App\Policies\SchoolPolicy',
        'CollegePortal\Models\User' => 'App\Policies\UserPolicy',
        'CollegePortal\Models\Faculty' => 'App\Policies\FacultyPolicy',
        'CollegePortal\Models\Department' => 'App\Policies\DepartmentPolicy',
        'CollegePortal\Models\Program' => 'App\Policies\ProgramPolicy',
        'CollegePortal\Models\Level' => 'App\Policies\LevelPolicy',
        'CollegePortal\Models\Student' => 'App\Policies\StudentPolicy',
        'CollegePortal\Models\Course' => 'App\Policies\CoursePolicy',
        'CollegePortal\Models\SemesterType' => 'App\Policies\SemesterTypePolicy',
        'CollegePortal\Models\Staff' => 'App\Policies\StaffPolicy',
        'CollegePortal\Models\Session' => 'App\Policies\SessionPolicy',
        'CollegePortal\Models\Semester' => 'App\Policies\SemesterPolicy',
        'CollegePortal\Models\ChargeableService' => 'App\Policies\ChargeableServicePolicy',
        'CollegePortal\Models\Chargeable' => 'App\Policies\ChargeablePolicy',
        'CollegePortal\Models\ProgramCredit' => 'App\Policies\ProgramCreditPolicy',
        'CollegePortal\Models\Payable' => 'App\Policies\PayablePolicy',
        'CollegePortal\Models\CourseDependency' => 'App\Policies\CourseDependencyPolicy',
        'CollegePortal\Models\StaffTeachCourse' => 'App\Policies\StaffTeachCoursePolicy',
        'CollegePortal\Models\StudentTakesCourse' => 'App\Policies\StudentTakesCoursePolicy',
        'CollegePortal\Models\GradeType' => 'App\Policies\GradeTypePolicy',
        'CollegePortal\Models\Grade' => 'App\Policies\GradePolicy',
        'CollegePortal\Models\ImageType' => 'App\Policies\ImageTypePolicy',
        'CollegePortal\Models\Image' => 'App\Policies\ImagePolicy',
        'CollegePortal\Models\IntentType' => 'App\Policies\IntentTypePolicy',
        'CollegePortal\Models\Intent' => 'App\Policies\IntentPolicy',
        'CollegePortal\Models\Role' => 'App\Policies\RolePolicy',
        'CollegePortal\Models\UserHasRole' => 'App\Policies\UserHasRolePolicy',
        'CollegePortal\Models\ContentType' => 'App\Policies\ContentTypePolicy',
        'CollegePortal\Models\Content' => 'App\Policies\ContentPolicy',
        'CollegePortal\Models\Invite' => 'App\Policies\InvitePolicy',
        'CollegePortal\Models\Prospect' => 'App\Policies\ProspectPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
