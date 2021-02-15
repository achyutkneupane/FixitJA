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
        $this->call(UserSeeder::class);
        \App\Models\User::factory(9)->create();
        \App\Models\Category::factory(5)->create();
        \App\Models\SubCategory::factory(15)->create();
        $this->call(TaskSeeder::class);
    }
}