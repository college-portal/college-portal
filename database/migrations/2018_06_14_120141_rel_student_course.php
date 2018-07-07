<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\StudentTakesCourse;
use App\Models\StaffTeachCourse;
use App\Models\Semester;
use App\Models\Student;

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
            $table->foreign('semester_id')->references('id')->on(Semester::name());
            $table->foreign('student_id')->references('id')->on(Student::name());
            $table->unique([ 'staff_teach_course_id', 'semester_id', 'student_id' ], 'student_takes_course_unique');
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
            $table->dropForeign([ 'semester_id' ]);
            $table->dropForeign([ 'student_id' ]);
            $table->dropUnique('student_takes_course_unique');
        });
    }
}
