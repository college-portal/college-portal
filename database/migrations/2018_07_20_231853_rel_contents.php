<?php

use App\Models\Content;
use App\Models\ContentType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelContents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Content::name(), function (Blueprint $table) {
            $table->foreign('content_type_id')->references('id')->on(ContentType::name());
            $table->unique([ 'owner_id', 'content_type_id', 'value' ]);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Content::name(), function (Blueprint $table) {
            $table->dropForeign([ 'content_type_id' ]);
            $table->dropUnique([ 'owner_id', 'content_type_id', 'value' ]);
        });

    }
}
