<?php

it('requires a task title', function () {
    $response = $this->postJson('/tasks', [
        'title' => '',
    ]);

    $response
        ->assertStatus(422)
        ->assertJsonValidationErrors('title');
});
