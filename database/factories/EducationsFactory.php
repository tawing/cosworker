<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class EducationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'educ_name' => fake()->unique()->randomElement(['Elementary', 'High School', 'Vocational', 'BS Information Technology', 'BS Nursing', 'BS Computer Science', 'BS Criminology', 'BS Education', 'BS Accountancy', 'BS Business Administration'])
        ];
    }
}
