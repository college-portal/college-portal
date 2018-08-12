<?php

use Illuminate\Database\Seeder;
use CollegePortal\Models\School;
use CollegePortal\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 3)->create();
    }
}
