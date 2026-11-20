<?php

namespace Tests\Feature;

use Tests\TestCase;

class TaskTest extends TestCase
{
    public function test_tasks_endpoint_returns_successful_response(): void
    {
        $response = $this->getJson('/tasks');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'title',
                        'completed',
                    ],
                ],
            ])
            ->assertJsonFragment([
                'title' => 'Write tests',
                'completed' => false,
            ]);
    }
}
