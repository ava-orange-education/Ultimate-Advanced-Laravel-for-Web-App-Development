<?php

Route::get('/health', function () {
    DB::connection()->getPdo();

    return response()->json([
        'status' => 'healthy',
    ]);
});
