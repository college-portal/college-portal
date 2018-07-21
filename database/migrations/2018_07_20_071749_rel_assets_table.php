<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Asset;
use App\Models\AssetType;

class RelAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Asset::name(), function (Blueprint $table) {
            $table->foreign('asset_types_id')->references('id')->on(AssetType::name());
            $table->unique([ 'owner_id', 'asset_types_id', 'location' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Asset::name(), function (Blueprint $table) {
            $table->dropForeign([ 'asset_types_id' ]);
            $table->dropUnique([ 'owner_id', 'asset_types_id', 'location' ]);
        });
    }
}
