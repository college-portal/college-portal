<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use CollegePortal\Models\ContentType;
use CollegePortal\Models\User;

class ContentTypesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->types()->each([ $this, 'createContentType' ]);
    }

    public function createContentType($opts, $spaces = 0) 
    {
        $type = ContentType::create(array_except($opts, [ 'children' ]));
        $name = $opts['name'];
        $spacer = str_repeat(' ', $spaces);
        $this->command->info($spacer . "- created $name content-type");
        if (isset($opts['children'])) {
            $opts['children']->each(function ($child) use ($spaces) {
                $this->createContentType($child, $spaces + 3);
            });
        }
    }

    public function types():Collection 
    {
        return new Collection([
            [
                'name' => 'profile',
                'display_name' => 'User Profile',
                'type' => User::class,
                'format' => ContentType::OBJECT,
                'children' => new Collection([
                    [
                        'name' => 'email_validated',
                        'display_name' => 'Email Validated',
                        'type' => User::class,
                        'format' => ContentType::BOOLEAN
                    ]
                ])
            ]
        ]);
    }
}
