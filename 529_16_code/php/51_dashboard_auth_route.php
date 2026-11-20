<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->get('/dashboard', function () {
    return response()->json([
        'message' => 'Welcome to your dashboard.',
    ]);
});
