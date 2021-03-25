<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\User;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Task::factory(10)->create() as $task) {
            $users = User::inRandomOrder()->where('id', '!=', '1')->take(rand(2, 10))->pluck('id');
            $task->assignedBy()->attach($users);
            $users = User::inRandomOrder()->where('id', '!=', '1')->take(rand(2, 10))->pluck('id');
            $task->assignedTo()->attach($users);
            $subCat = SubCategory::inRandomOrder()->take(rand(4,7))->pluck('id');
            $task->subcategories()->attach($subCat);
        }
    }
}