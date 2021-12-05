<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GoalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'is_approved' => $this->faker->numberBetween(0,1),
            'url' => $this->faker->url(),
            'avg_rating' => $this->faker->numberBetween(1, 5),
        ];
    }
}
