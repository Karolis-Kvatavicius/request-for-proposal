<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(20)->create();
        \App\Models\UsersRole::factory(20)->create();
        \App\Models\Role::factory(4)->create();
        \App\Models\Type::factory(2)->create();
        \App\Models\Category::factory(4)->create();
    }
}
