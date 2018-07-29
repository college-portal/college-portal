<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\InviteRole;

class CreateInviteRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(InviteRole::name(), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invite_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->string('extras')->nullable();
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
        Schema::dropIfExists(InviteRole::name());
    }
}
