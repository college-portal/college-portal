<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Group;
use App\User;

class RelGroupUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Group::name(), function (Blueprint $table) {
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
        Schema::table(Group::name(), function (Blueprint $table) {
            $table->dropForeign([ 'owner_id' ]);
        });
    }
}
