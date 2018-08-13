<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use CollegePortal\Models\User;
use CollegePortal\Models\Staff;
use CollegePortal\Models\School;
use CollegePortal\Models\Department;

class RelStaffUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Staff::name(), function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on(User::name());
            $table->foreign('school_id')->references('id')->on(School::name());
            $table->foreign('department_id')->references('id')->on(Department::name());
            $table->unique([ 'user_id', 'school_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Staff::name(), function (Blueprint $table) {
            $table->dropForeign([ 'user_id' ]);
            $table->dropForeign([ 'school_id' ]);
            $table->dropForeign([ 'department_id' ]);
            $table->dropUnique([ 'user_id', 'school_id' ]);
        });
    }
}
