<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;
use App\Models\Invite;
use App\Models\InviteRole;
use App\Models\School;

class RelInvites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Invite::name(), function (Blueprint $table) {
            $table->foreign('creator_id')->references('id')->on(User::name());
            $table->foreign('school_id')->references('id')->on(School::name());
            $table->unique([ 'school_id', 'email' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Invite::name(), function (Blueprint $table) {
            $table->dropForeign([ 'creator_id' ]);
            $table->dropForeign([ 'school_id' ]);
            $table->dropUnique([ 'school_id', 'email' ]);
        });
    }
}
