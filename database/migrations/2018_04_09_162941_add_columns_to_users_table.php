<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(User::name(), function (Blueprint $table) {
            $table->string('first_name', 255)->after('password');
            $table->string('last_name', 255)->after('first_name');
            $table->string('other_names', 255)->after('last_name')->nullable();
            $table->date('dob')->after('other_names');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(User::name(), function (Blueprint $table) {
            $table->dropColumn([ 'first_name', 'last_name', 'other_names', 'dob' ]);
        });
    }
}
