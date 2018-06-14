<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Grade;
use App\Models\StudentTakesCourse;

class RelGradeTypeStudent extends Migration
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
            $table->dropForeign([ 'student_takes_course_id' ]);
        });
    }
}
