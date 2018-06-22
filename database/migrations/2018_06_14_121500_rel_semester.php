<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Session;
use App\Models\Semester;
use App\Models\SemesterType;

class RelSemester extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Semester::name(), function (Blueprint $table) {
            $table->foreign('session_id')->references('id')->on(Session::name());
            $table->foreign('semester_type_id')->references('id')->on(SemesterType::name());
            $table->unique([ 'session_id', 'semester_type_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Semester::name(), function (Blueprint $table) {
            $table->dropForeign([ 'session_id' ]);
            $table->dropForeign([ 'semester_type_id' ]);
            $table->dropUnique([ 'session_id', 'semester_type_id' ]);
        });
    }
}
