<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use CollegePortal\Models\Department;
use CollegePortal\Models\Staff;
use CollegePortal\Models\Faculty;

class RelDepartmentStaffFaculty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Department::name(), function (Blueprint $table) {
            $table->foreign('hod_id')->references('id')->on(Staff::name());
            $table->foreign('faculty_id')->references('id')->on(Faculty::name());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Department::name(), function (Blueprint $table) {
            $table->dropForeign([ 'hod_id' ]);
            $table->dropForeign([ 'faculty_id' ]);
        });
    }
}
