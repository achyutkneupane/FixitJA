<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\User;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (User::all() as $user) {
            $subs = SubCategory::inRandomOrder()->take(rand(1, 100))->pluck('id');
            $user->subcategories()->attach($subs);
        }
    }
}