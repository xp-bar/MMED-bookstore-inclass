<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // newer laravel versions use fake() instead of $this->faker
            // 'title' => fake()->name
            'title' => $this->faker->name,
            'author_id' => null,
            'publisher_id' => null,
        ];
    }
}
