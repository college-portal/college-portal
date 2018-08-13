<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use CollegePortal\Models\Grade;
use CollegePortal\Models\StudentTakesCourse;

class RelGrades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Grade::name(), function (Blueprint $table) {
            $table->foreign('student_takes_course_id')->references('id')->on(StudentTakesCourse::name());
            $table->unique([ 'student_takes_course_id', 'description' ], 'grades_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Grade::name(), function (Blueprint $table) {
            
        });
    }
}
