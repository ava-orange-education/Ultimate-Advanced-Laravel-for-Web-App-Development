<?php

namespace Tests\Feature;

use Tests\TestCase;

class TaskTest extends TestCase
{
    public function test_tasks_endpoint_returns_successful_response(): void
    {
        $response = $this->get('/tasks');

        $response->assertStatus(200);
    }
}
