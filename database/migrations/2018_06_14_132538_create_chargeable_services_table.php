<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\ChargeableService;

class CreateChargeableServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(ChargeableService::name(), function (Blueprint $table) {
            $table->increments('id');
			$table->string('type');
			$table->string('name');
			$table->text('description', 65535)->nullable();
			$table->decimal('amount')->nullable();
			$table->integer('school_id')->unsigned();
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
        Schema::dropIfExists(ChargeableService::name());
    }
}
