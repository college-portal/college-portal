<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Session;
use App\Semester;
use App\SemesterType;

class RelSemesterType extends Migration
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
            $table->dropColumn([ 'session_id' ]);
            $table->dropColumn([ 'semester_type_id' ]);
        });
    }
}
