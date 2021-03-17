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
        if (app()->environment() == 'local') {
            \App\Models\Category::factory(10)->create();
            \App\Models\SubCategory::factory(100)->create();
        }
        $this->call(UserSeeder::class);
        if (app()->environment() == 'local') {
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
            $this->call(SkillSeeder::class);
        }
        // $this->call(TaskSeeder::class);
    }
}