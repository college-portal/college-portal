<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use CollegePortal\Models\User;
use CollegePortal\Models\Chargeable;
use CollegePortal\Models\Payable;

class RelPayables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Payable::name(), function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on(User::name());
            $table->foreign('chargeable_id')->references('id')->on(Chargeable::name());
            $table->unique([ 'user_id', 'chargeable_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Payable::name(), function (Blueprint $table) {
            $table->dropForeign([ 'user_id' ]);
            $table->dropForeign([ 'chargeable_id' ]);
            $table->dropUnique([ 'user_id', 'chargeable_id' ]);
        });
    }
}
