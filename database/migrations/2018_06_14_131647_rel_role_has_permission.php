<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Role;
use App\Models\Permission;
use App\Models\RoleHasPermission;

class RelRoleHasPermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(RoleHasPermission::name(), function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on(Role::name());
            $table->foreign('permission_id')->references('id')->on(Permission::name());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(RoleHasPermission::name(), function (Blueprint $table) {
            $table->dropColumn([ 'role_id' ]);
            $table->dropColumn([ 'permission_id' ]);
        });
    }
}
