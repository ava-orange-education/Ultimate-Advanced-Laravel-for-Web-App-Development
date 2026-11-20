<?php

it('returns a successful tasks response', function () {
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
});
