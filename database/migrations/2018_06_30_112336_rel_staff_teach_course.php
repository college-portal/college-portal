<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Staff;
use App\Models\Course;
use App\Models\Semester;
use App\Models\StaffTeachCourse;

class RelStaffTeachCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(StaffTeachCourse::name(), function (Blueprint $table) {
            $table->foreign('staff_id')->references('id')->on(Staff::name());
            $table->foreign('course_id')->references('id')->on(Course::name());
            $table->foreign('semester_id')->references('id')->on(Semester::name());
            $table->unique([ 'staff_id', 'course_id', 'semester_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(StaffTeachCourse::name(), function (Blueprint $table) {
            $table->dropForeign([ 'staff_id' ]);
            $table->dropForeign([ 'course_id' ]);
            $table->dropUnique([ 'staff_id', 'course_id', 'semester_id' ]);
        });
    }
}
