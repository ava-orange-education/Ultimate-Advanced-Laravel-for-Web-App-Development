<?php

it('redirects to the tasks page after creating a task', function () {
    $response = $this->post('/tasks', [
        'title' => 'Write redirect tests',
    ]);

    $response
        ->assertRedirect('/tasks')
        ->assertSessionHas('status', 'Task created.');
});
