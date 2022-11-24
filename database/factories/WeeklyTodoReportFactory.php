<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WeeklyTodoReport>
 */
class WeeklyTodoReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'todo' => $this->faker->numberBetween(0, 100),
            'done' => $this->faker->numberBetween(0, 100),
            'in_progress' => $this->faker->numberBetween(0, 100)
        ];
    }
}
