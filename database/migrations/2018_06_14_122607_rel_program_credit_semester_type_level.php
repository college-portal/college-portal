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
            $table->dropColumn([ 'level_id' ]);
            $table->dropColumn([ 'semester_id' ]);
            $table->dropColumn([ 'program_id' ]);
        });
    }
}
