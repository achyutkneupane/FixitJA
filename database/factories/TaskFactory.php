<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'created_by' => '1',
            'created_for' => $this->faker->numberBetween(2, 10),
            'status' => $this->faker->randomElement(array('completed', 'new', 'pending', 'assigned')),
            'description' => $this->faker->text(10),
            'type' => $this->faker->randomElement(array('N/A', 'ready to hire', 'planning', 'budgeting')),
            'deadline' => $this->faker->randomElement(array('N/A', 'asap', 'within a week', 'within a month', 'more than a month', 'flexible')),
            'creator_city_id' => $this->faker->numberBetween(1, 16),
            'is_client_on_site' => $this->faker->randomElement(array('0', '1')),
            'is_repair_parts_provided' => $this->faker->randomElement(array('0', '1')),
        ];
    }
}