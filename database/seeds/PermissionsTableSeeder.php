<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Collection;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->permissions() as $permission) {
            Permission::firstOrCreate([
                'name' => $permission
            ]);
            $this->command->info("permission \"$permission\" created");
        }
    }

    public function permissions() {
        return [
            
        ];
    }
}
