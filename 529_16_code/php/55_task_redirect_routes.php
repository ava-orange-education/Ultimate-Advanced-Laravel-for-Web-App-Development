<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/tasks', function (Request $request) {
    $request->validate([
        'title' => ['required', 'string', 'min:3'],
    ]);

    return redirect('/tasks')->with('status', 'Task created.');
});

Route::get('/tasks', function () {
    return view('tasks.index');
});
