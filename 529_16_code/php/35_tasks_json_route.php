<?php

Route::get('/tasks', function () {
    return response()->json([
        ['title' => 'Write tests'],
        ['title' => 'Review pull requests'],
    ]);
});
