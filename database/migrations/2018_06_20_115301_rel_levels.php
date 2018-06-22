<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Level;
use App\Models\School;

class RelLevels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Level::name(), function (Blueprint $table) {
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
        Schema::table(Level::name(), function (Blueprint $table) {
            $table->dropForeign([ 'school_id' ]);
            $table->dropUnique([ 'name', 'school_id' ]);
        });
    }
}
