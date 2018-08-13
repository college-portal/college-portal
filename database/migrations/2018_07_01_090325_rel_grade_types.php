<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use CollegePortal\Models\School;
use CollegePortal\Models\GradeType;

class RelGradeTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(GradeType::name(), function (Blueprint $table) {
            $table->foreign('school_id')->references('id')->on(School::name());
            $table->unique([ 'name', 'school_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(GradeType::name(), function (Blueprint $table) {
            $table->dropForeign([ 'school_id' ]);
            $table->dropUnique([ 'name', 'school_id' ]);
        });
    }
}
