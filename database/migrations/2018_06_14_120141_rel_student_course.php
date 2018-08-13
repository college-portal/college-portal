<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use CollegePortal\Models\StudentTakesCourse;
use CollegePortal\Models\StaffTeachCourse;
use CollegePortal\Models\Semester;
use CollegePortal\Models\Student;

class RelStudentCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(StudentTakesCourse::name(), function (Blueprint $table) {
            $table->foreign('staff_teach_course_id')->references('id')->on(StaffTeachCourse::name());
            $table->foreign('student_id')->references('id')->on(Student::name());
            $table->unique([ 'staff_teach_course_id', 'student_id' ], 'student_takes_course_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(StudentTakesCourse::name(), function (Blueprint $table) {
            $table->dropForeign([ 'staff_teach_course_id' ]);
            $table->dropForeign([ 'student_id' ]);
            $table->dropUnique('student_takes_course_unique');
        });
    }
}
