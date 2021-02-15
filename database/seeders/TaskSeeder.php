<?php

namespace Database\Seeders;

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
        Task::factory(10)->create();
        foreach (Task::all() as $task) {
            $users = User::inRandomOrder()->take(rand(2, 10))->pluck('id');
            $task->assignedBy()->attach($users);
            $users = User::inRandomOrder()->take(rand(2, 10))->pluck('id');
            $task->assignedTo()->attach($users);
        }
    }
}