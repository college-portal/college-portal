<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Faculty;
use App\Models\School;
use App\Models\Staff;

class RelFacultySchool extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Faculty::name(), function (Blueprint $table) {
            $table->foreign('dean_id')->references('id')->on(Staff::name());
            $table->foreign('school_id')->references('id')->on(School::name());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Faculty::name(), function (Blueprint $table) {
            $table->dropForeign([ 'dean_id' ]);
            $table->dropForeign([ 'school_id' ]);
        });
    }
}
