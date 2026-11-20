<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'completed' => false,
        ];
    }

    public function completed(): Factory
    {
        return $this->state(function () {
            return [
                'completed' => true,
            ];
        });
    }
}
