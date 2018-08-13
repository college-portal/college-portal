<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use CollegePortal\Models\School;
use CollegePortal\Models\User;

class RelSchoolUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(School::name(), function (Blueprint $table) {
            $table->foreign('owner_id')->references('id')->on(User::name());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(School::name(), function (Blueprint $table) {
            $table->dropForeign([ 'owner_id' ]);
        });
    }
}
