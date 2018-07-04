<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
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
            $table->string('first_name')->nullable()->after('password');
            $table->string('last_name')->nullable()->after('first_name');
            $table->string('other_names')->nullable()->after('last_name');
            $table->string('display_name', 1000)->nullable()->after('other_names');
            $table->date('dob')->default('1960-01-01')->after('display_name');
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
            $table->dropColumn([ 'first_name', 'last_name', 'other_names', 'dispay_name', 'dob' ]);
        });
    }
}
