<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/tasks', function (Request $request) {
    $validated = $request->validate([
        'title' => ['required', 'string', 'min:3'],
    ]);

    return response()->json([
        'message' => 'Task created.',
        'data' => $validated,
    ], 201);
});
