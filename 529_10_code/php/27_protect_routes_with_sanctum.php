Route::middleware('auth:sanctum')
    ->get('/users', ListUsersController::class);
