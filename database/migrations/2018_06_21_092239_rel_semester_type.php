<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\SemesterType;
use App\Models\School;

class RelSemesterType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(SemesterType::name(), function (Blueprint $table) {
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
        Schema::table(SemesterType::name(), function (Blueprint $table) {
            $table->dropForeign([ 'school_id' ]);
            $table->dropUnique([ 'school_id', 'name' ]);
        });
    }
}
