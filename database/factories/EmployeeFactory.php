<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'educ_id' => fake()->numberBetween(1, 10),
            'firstname' => fake()->firstName(),
            'middlename' => fake()->lastName(),
            'lastname' => fake()->lastName(),
            'ressuffix' => fake()->suffix(),
            'educ' => fake()->randomElement(['Elementary', 'High School', 'Vocational', 'BS Information Technology', 'BS Nursing', 'BS Computer Science', 'BS Criminology', 'BS Education', 'BS Accountancy', 'BS Business Administration']),
            'eligibility' => 'Professional',
            'birthdate' => fake()->date(),
            'gender' => fake()->randomElement(['Male', 'Female', 'Others']),
            'address' => fake()->address(),
            'contact_no' => fake()->randomNumber(9, true),
            'email' => fake()->unique()->safeEmail(),
            'marital_status' => fake()->randomElement(['Single', 'Married', 'Widowed', 'Separated']),
            'tin_no' => fake()->numberBetween(100000000, 999999999),
            'agencyemp_no' => fake()->numberBetween(100000000, 999999999),
            'activate' => 1,
            'deactivate' => 0,
            'blacklist' => 0,
            'name_ext' => fake()->suffix(),
        ];
    }
}
