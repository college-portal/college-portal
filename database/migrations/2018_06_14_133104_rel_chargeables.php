<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Chargeable;
use App\Models\ChargeableService;

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
        });
    }
}
