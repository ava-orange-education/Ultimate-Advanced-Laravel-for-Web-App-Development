Route::middleware(['auth:api', 'scopes:users:read'])
    ->get('/users', ListUsersController::class);
