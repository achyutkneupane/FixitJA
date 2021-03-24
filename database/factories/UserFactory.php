<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'gender' => $this->faker->randomElement(array('male', 'female', 'other')),
            'companyname' => $this->faker->company,
            'email_verified_at' => now(),
            'website' => $this->faker->domainName,
            'is_police_record' => '0',
            'is_travelling' => '0',
            'city_id' => $this->faker->numberBetween(1, 16),
            'type' => $this->faker->randomElement(array('independent_contractor', 'business', 'general_user')),
            'status' => 'active',
            'verification_code' => sha1(time()),
            'password' => Hash::make('Kumberland@123'),
            'remember_token' => Str::random(10),
        ];
    }
}