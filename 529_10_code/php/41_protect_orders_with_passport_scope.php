Route::middleware(['auth:api', 'scopes:orders:write'])
    ->post('/orders', CreateOrderController::class);
