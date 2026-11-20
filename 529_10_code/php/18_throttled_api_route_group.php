Route::middleware(['api', 'throttle:api'])
    ->prefix('v1')
    ->group($apiRoutesPath);
