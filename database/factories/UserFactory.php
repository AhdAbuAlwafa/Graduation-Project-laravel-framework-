<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fname' => fake()->name(),
            'lname' => fake()->name(),
            'number'=>fake()->numberBetween(9,9),
            'image'=>fake()->image,
            'password' => fake()->password(6,11),
            'description'=>fake()->paragraph,
            'num_evl'=>fake()->numberBetween(0,5),
             'all_evl'=>fake()->numberBetween(0,5),
             'gender'=>fake()->boolean,
             'is_worker'=>fake()->boolean,
             'address_id'=>fake()->numberBetween(1,9),

        ];
    }
    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
