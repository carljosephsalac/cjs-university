<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $prelim = fake()->randomFloat(1, 1, 3);
        $midterm = fake()->randomFloat(1, 1, 3);
        $finals = fake()->randomFloat(1, 1, 3);

        $average = ($prelim + $midterm + $finals) / 3;

        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'middle_initial' => strtoupper(fake()->randomLetter()),
            'email' => fake()->email(),
            'course' => fake()->randomElement(['BSIT', 'BSCS', 'BSIS', 'CompE']),
            'year' => fake()->randomElement(['1', '2', '3', '4']),
            'prelim' => $prelim == floor($prelim) ? (string)floor($prelim) : number_format(floor($prelim * 10) / 10, 1),
            'midterm' => $midterm == floor($midterm) ? (string)floor($midterm) : number_format(floor($midterm * 10) / 10, 1),
            'finals' => $finals == floor($finals) ? (string)floor($finals) : number_format(floor($finals * 10) / 10, 1),
            'average' => number_format($average, 1, '.', ''),
        ];
    }
}
