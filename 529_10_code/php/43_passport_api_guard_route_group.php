Route::middleware(['api', 'auth:api'])
    ->group(function () {
        Route::get('/users', ListUsersController::class);
    });
