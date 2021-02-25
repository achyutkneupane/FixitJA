<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $this->call(UserSeeder::class);
        foreach (\App\Models\User::factory(9)->create() as $user) {
            $user->emails()->create([
                'email' => $faker->unique()->safeEmail,
                'primary' => true
            ]);
            $user->phones()->create([
                'phone' => $faker->unique()->phoneNumber,
                'primary' => true
            ]);
        }
        \App\Models\Category::factory(10)->create();
        \App\Models\SubCategory::factory(100)->create();
        $this->call(TaskSeeder::class);
    }
}