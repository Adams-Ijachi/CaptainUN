<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UpdateFactory extends Factory
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

            'title' => $this->faker->name(),
            'description' => $this->faker->text(),
            'updatable_type' => 'App\Models\Cap',
            'updatable_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
