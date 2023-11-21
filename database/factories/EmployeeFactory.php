<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->user_id,
            'firstname' => $this->faker->firstname,
            'lastname' => $this->faker->lastname,
            'phonenumber' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'zipcode' => $this->faker->postcode,
            'housenumber' => $this->faker->housenumber,

        ];
    }
}
