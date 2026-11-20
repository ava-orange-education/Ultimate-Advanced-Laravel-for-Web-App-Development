<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_task_is_stored_in_database(): void
    {
        $response = $this->postJson('/tasks', [
            'title' => 'Write feature tests',
        ]);

        $response->assertCreated();

        $this->assertDatabaseHas('tasks', [
            'title' => 'Write feature tests',
            'completed' => false,
        ]);
    }
}
