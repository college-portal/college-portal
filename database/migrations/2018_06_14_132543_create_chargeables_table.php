<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use CollegePortal\Models\Chargeable;

class CreateChargeablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Chargeable::name(), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chargeable_service_id')->unsigned();
			$table->integer('owner_id')->unsigned();
			$table->decimal('amount')->nullable();
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Chargeable::name());
    }
}
