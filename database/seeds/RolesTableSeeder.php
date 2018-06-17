<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Collection;

class RolesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->roles() as $role => $name) {
            Role::firstOrCreate([
                'name' => $role,
                'display_name' => $name
            ]);
            $this->command->info("role \"$role\" created");
        }
    }

    public function roles() {
        return [
            'admin' => 'Administrator',
            'school-owner' => 'School Owner'
        ];
    }
}
