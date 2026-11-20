<?php

Route::get('/tasks', function () {
    return response()->json([
        'data' => [
            [
                'id' => 1,
                'title' => 'Write tests',
                'completed' => false,
            ],
            [
                'id' => 2,
                'title' => 'Review pull requests',
                'completed' => true,
            ],
        ],
    ]);
});
