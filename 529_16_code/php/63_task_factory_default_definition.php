<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'completed' => false,
            'priority' => fake()->randomElement([
                'low',
                'medium',
                'high',
            ]),
            'due_date' => fake()->dateTimeBetween(
                'now',
                '+1 month'
            ),
            'user_id' => User::factory(),
        ];
    }
}
