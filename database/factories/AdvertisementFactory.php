<?php

namespace Database\Factories;

use App\Models\Advertisement;
use App\Models\Craft;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class AdvertisementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advertisement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $craft = Craft::inRandomOrder()->first();

        return [
            'adv_date' => $this->faker->date,
            'adv_req' => $this->faker->sentence,
            'job_des' => $this->faker->paragraph,
            'work_hour' => $this->faker->numberBetween(1, 8),
            'job_name' => $craft->craft_name,
            'adv_period' => $this->faker->numberBetween(1, 30),
            'work_period' => $this->faker->randomElement(['full-time', 'part-time']),
            'is_worker' => $this->faker->boolean,
            'gender' => $this->faker->randomElement([0, 1]),
            'user_id' => $this->faker->numberBetween(3, 6),
            'address_id' => $this->faker->numberBetween(3, 8),
        ];
    }
}
