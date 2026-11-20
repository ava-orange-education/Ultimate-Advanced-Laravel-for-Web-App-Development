<?php

it('can follow redirects after task creation', function () {
    $response = $this->followingRedirects()
        ->post('/tasks', [
            'title' => 'Write redirect tests',
        ]);

    $response
        ->assertOk()
        ->assertSee('Task created.');
});
