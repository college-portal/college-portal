<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\SchoolHasUser;
use App\Models\School;
use App\User;

class RelSchoolHasUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(SchoolHasUser::name(), function (Blueprint $table) {
            $table->foreign('school_id')->references('id')->on(School::name());
            $table->foreign('user_id')->references('id')->on(User::name());
            $table->unique([ 'school_id', 'user_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(SchoolHasUser::name(), function (Blueprint $table) {
            $table->dropForeign([ 'school_id' ]);
            $table->dropForeign([ 'user_id' ]);
            $table->dropUnique([ 'school_id', 'user_id' ]);
        });
    }
}
