<?php

public function test_task_title_is_required_for_form_submission(): void
{
    $response = $this->post('/tasks', [
        'title' => '',
    ]);

    $response->assertSessionHasErrors('title');
}
