<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Course;
use App\Models\Department;
use App\Models\SemesterType;
use App\Models\Level;

class RelCourseDepartment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Course::name(), function (Blueprint $table) {
            $table->foreign('department_id')->references('id')->on(Department::name());
            $table->foreign('semester_type_id')->references('id')->on(SemesterType::name());
            $table->foreign('level_id')->references('id')->on(Level::name());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Course::name(), function (Blueprint $table) {
            $table->dropForeign([ 'department_id' ]);
            $table->dropForeign([ 'semester_type_id' ]);
            $table->dropForeign([ 'level_id' ]);
        });
    }
}
