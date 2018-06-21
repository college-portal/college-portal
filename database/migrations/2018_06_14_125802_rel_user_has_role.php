<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;
use App\Models\Role;
use App\Models\School;
use App\Models\UserHasRole;

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
