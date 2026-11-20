<?php

namespace Tests\Feature;

use Tests\TestCase;

class TaskRedirectTest extends TestCase
{
    public function test_task_creation_redirects_to_tasks_page(): void
    {
        $response = $this->post('/tasks', [
            'title' => 'Write redirect tests',
        ]);

        $response
            ->assertRedirect('/tasks')
            ->assertSessionHas('status', 'Task created.');
    }
}
