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
        foreach (Task::factory(50)->create() as $task) {
            $users = User::inRandomOrder()->where('id', '!=', '1')->take(rand(2, 10))->pluck('id');
            $task->assignedBy()->attach($users);
            $users = User::inRandomOrder()->where('id', '!=', '1')->take(rand(2, 10))->pluck('id');
            $task->assignedTo()->attach($users);
        }
    }
}