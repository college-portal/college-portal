<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use CollegePortal\Models\Course;
use CollegePortal\Models\CourseDependency;

class RelCourseDependency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(CourseDependency::name(), function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on(Course::name());
            $table->foreign('dependency_id')->references('id')->on(Course::name());
            $table->unique([ 'course_id', 'dependency_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(CourseDependency::name(), function (Blueprint $table) {
            $table->dropForeign([ 'course_id' ]);
            $table->dropForeign([ 'dependency_id' ]);
            $table->dropUnique([ 'course_id', 'dependency_id' ]);
        });
    }
}
