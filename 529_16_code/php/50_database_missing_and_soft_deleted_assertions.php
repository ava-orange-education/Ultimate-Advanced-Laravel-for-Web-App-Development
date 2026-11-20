<?php

$this->assertDatabaseMissing('tasks', [
    'title' => 'Deleted task',
]);

$this->assertSoftDeleted('tasks', [
    'title' => 'Archived task',
]);
