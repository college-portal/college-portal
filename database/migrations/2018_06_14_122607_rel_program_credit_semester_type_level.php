<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\ProgramCredit;
use App\Models\Semester;
use App\Models\Program;
use App\Models\Level;

class RelProgramCreditSemesterTypeLevel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(ProgramCredit::name(), function (Blueprint $table) {
            $table->foreign('level_id')->references('id')->on(Level::name());
            $table->foreign('semester_id')->references('id')->on(Semester::name());
            $table->foreign('program_id')->references('id')->on(Program::name());
            $table->unique([ 'level_id', 'semester_id', 'program_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(ProgramCredit::name(), function (Blueprint $table) {
            $table->dropForeign([ 'level_id' ]);
            $table->dropForeign([ 'semester_id' ]);
            $table->dropForeign([ 'program_id' ]);
            $table->dropUnique([ 'level_id', 'semester_id', 'program_id' ]);
        });
    }
}
