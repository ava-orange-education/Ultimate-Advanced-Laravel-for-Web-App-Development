<?php

public function test_task_creation_can_follow_redirect(): void
{
    $response = $this->followingRedirects()
        ->post('/tasks', [
            'title' => 'Write redirect tests',
        ]);

    $response
        ->assertOk()
        ->assertSee('Task created.');
}
