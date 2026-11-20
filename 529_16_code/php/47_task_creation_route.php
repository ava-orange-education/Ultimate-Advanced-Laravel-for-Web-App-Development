<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/tasks', function (Request $request) {
    $validated = $request->validate([
        'title' => ['required', 'string', 'min:3'],
    ]);

    Task::create([
        'title' => $validated['title'],
        'completed' => false,
    ]);

    return response()->json([
        'message' => 'Task created.',
    ], 201);
});
