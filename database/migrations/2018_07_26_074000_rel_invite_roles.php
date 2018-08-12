<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use CollegePortal\Models\User;
use CollegePortal\Models\Invite;
use CollegePortal\Models\InviteRole;
use CollegePortal\Models\School;
use CollegePortal\Models\Role;

class RelInviteRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(InviteRole::name(), function (Blueprint $table) {
            $table->foreign('invite_id')->references('id')->on(Invite::name());
            $table->foreign('role_id')->references('id')->on(Role::name());
            $table->unique([ 'invite_id', 'role_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(InviteRole::name(), function (Blueprint $table) {
            $table->dropForeign([ 'invite_id' ]);
            $table->dropForeign([ 'role_id' ]);
            $table->dropUnique([ 'invite_id', 'role_id' ]);
        });
    }
}
