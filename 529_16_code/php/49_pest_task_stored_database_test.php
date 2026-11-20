<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('stores a task in the database', function () {
    $response = $this->postJson('/tasks', [
        'title' => 'Write feature tests',
    ]);

    $response->assertCreated();

    $this->assertDatabaseHas('tasks', [
        'title' => 'Write feature tests',
        'completed' => false,
    ]);
});
