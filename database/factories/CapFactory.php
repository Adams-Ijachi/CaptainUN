<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CapFactory extends Factory
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
            'is_approved' => $this->faker->boolean(),
            'user_id' => $this->faker->numberBetween(12,15),
            // chose between two company and country
    
            'type' => ['company','country'][rand(0,1)],
        ];
    }
}
