<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\GradeType;

class CreateGradeTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(GradeType::name(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('value')->unsigned();
            $table->integer('school_id')->unsigned();
            $table->decimal('minimum')->unsigned();
            $table->decimal('maximum')->unsigned();
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
        Schema::dropIfExists(GradeType::name());
    }
}
