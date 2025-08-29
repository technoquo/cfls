<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VerifyCode>
 */
class CodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => null, // se asigna en el seeder o con state()
            'code'    => strtoupper($this->faker->unique()->bothify('????-????-????')),
            'theme'   => null, // se asigna en el seeder o con state()
            'active'  => null, // se asigna en el seeder o con state()
        ];
    }
}
