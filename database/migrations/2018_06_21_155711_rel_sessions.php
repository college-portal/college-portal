<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Session;
use App\Models\School;

class RelSessions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Session::name(), function (Blueprint $table) {
            $table->foreign('school_id')->references('id')->on(School::name());
            $table->unique([ 'school_id', 'name' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Session::name(), function (Blueprint $table) {
            $table->dropForeign([ 'school_id' ]);
            $table->dropUnique([ 'school_id', 'name' ]);
        });
    }
}
