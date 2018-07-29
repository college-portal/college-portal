<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;
use App\Models\Prospect;
use App\Models\Program;
use App\Models\School;
use App\Models\Session;
use App\Models\Student;

class RelProspects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Prospect::name(), function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on(User::name());
            $table->foreign('school_id')->references('id')->on(School::name());
            $table->foreign('program_id')->references('id')->on(Program::name());
            $table->foreign('session_id')->references('id')->on(Session::name());
            $table->foreign('student_id')->references('id')->on(Student::name());
            $table->unique([ 'user_id', 'school_id', 'session_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Prospect::name(), function (Blueprint $table) {
            $table->dropForeign([ 'user_id' ]);
            $table->dropForeign([ 'school_id' ]);
            $table->dropForeign([ 'program_id' ]);
            $table->dropForeign([ 'session_id' ]);
            $table->dropForeign([ 'student_id' ]);
            $table->dropUnique([ 'user_id', 'school_id', 'session_id' ]);
        });
    }
}
