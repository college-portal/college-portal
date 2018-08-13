<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use CollegePortal\Models\User;
use CollegePortal\Models\Role;
use CollegePortal\Models\School;
use CollegePortal\Models\UserHasRole;

class RelUserHasRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(UserHasRole::name(), function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on(User::name());
            $table->foreign('role_id')->references('id')->on(Role::name());
            $table->foreign('school_id')->references('id')->on(School::name());
            $table->unique([ 'user_id', 'role_id', 'school_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(UserHasRole::name(), function (Blueprint $table) {
            $table->dropForeign([ 'user_id' ]);
            $table->dropForeign([ 'role_id' ]);
            $table->dropForeign([ 'school_id' ]);
            $table->dropUnique([ 'user_id', 'role_id', 'school_id' ]);
        });
    }
}
