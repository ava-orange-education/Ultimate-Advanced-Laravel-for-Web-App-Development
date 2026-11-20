<?php

Task::factory()->count(5)->create();

$this->assertDatabaseCount('tasks', 5);
