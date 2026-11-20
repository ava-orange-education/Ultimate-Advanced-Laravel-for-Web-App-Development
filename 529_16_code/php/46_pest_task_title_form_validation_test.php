<?php

it('stores validation errors in the session for form submissions', function () {
    $response = $this->post('/tasks', [
        'title' => '',
    ]);

    $response->assertSessionHasErrors('title');
});
