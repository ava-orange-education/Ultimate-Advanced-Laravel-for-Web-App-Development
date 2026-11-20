<?php

namespace Tests\Feature;

use Tests\TestCase;

class TaskTest extends TestCase
{
    public function test_task_title_is_required(): void
    {
        $response = $this->postJson('/tasks', [
            'title' => '',
        ]);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors('title');
    }
}
