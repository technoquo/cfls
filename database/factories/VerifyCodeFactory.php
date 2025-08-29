<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VerifyCode>
 */
class VerifyCodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 0, // Default to 0 as per seeder
            'code' => $this->faker->unique()->numerify('########'), // 8-digit unique random code
            'theme' => null, // Default to null as per seeder
            'active' => 0, // Default to inactive
        ];
    }
}
