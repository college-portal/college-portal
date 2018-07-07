<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Image;
use App\Models\ImageType;

class RelImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Image::name(), function (Blueprint $table) {
            $table->foreign('image_type_id')->references('id')->on(ImageType::name());
            $table->unique([ 'owner_id', 'image_type_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Image::name(), function (Blueprint $table) {
            $table->dropForeign([ 'image_type_id' ]);
            $table->dropUnique([ 'owner_id', 'image_type_id' ]);
        });
    }
}
