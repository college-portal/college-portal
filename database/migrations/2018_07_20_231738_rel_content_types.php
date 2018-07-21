<?php

use App\Models\ContentType;
use App\Models\School;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelContentTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(ContentType::name(), function (Blueprint $table) {
            $table->foreign('related_to')->references('id')->on(School::name());
            $table->unique(['school_id', 'type', 'name']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(ContentType::name(), function (Blueprint $table) {
            $table->dropForeign(['related_to']);
            $table->dropUnique(['school_id', 'type', 'name']);
        });

    }
}
