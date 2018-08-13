<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use CollegePortal\Models\Chargeable;
use CollegePortal\Models\ChargeableService;

class RelChargeables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Chargeable::name(), function (Blueprint $table) {
            $table->foreign('chargeable_service_id')->references('id')->on(ChargeableService::name());
			$table->unique(['chargeable_service_id','owner_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Chargeable::name(), function (Blueprint $table) {
            $table->dropForeign([ 'chargeable_service_id' ]);
            $table->dropUnique([ 'chargeable_service_id', 'owner_id' ]);
        });
    }
}
