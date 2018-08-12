<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use CollegePortal\Models\School;
use CollegePortal\Models\ChargeableService;

class RelChargeableServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(ChargeableService::name(), function (Blueprint $table) {
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
        Schema::table(ChargeableService::name(), function (Blueprint $table) {
            $table->dropForeign([ 'school_id' ]);
        });
    }
}
