<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {

        return [
            'name' => fake('tr_TR')->firstName(),
            'surname' => fake('tr_TR')->lastName(),
            'city' => fake('tr_TR')->city(),
            'age' => fake()->numberBetween(18,27),
            'position' => fake()->randomElement(['backend' ,'frontend', 'full stack']),
            'experience' => fake()->randomElement(['junior', 'middle', 'senior']),
        ];
    }

}
