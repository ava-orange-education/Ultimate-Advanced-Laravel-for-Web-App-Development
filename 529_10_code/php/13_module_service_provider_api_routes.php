// ModuleServiceProvider::registerRoutes()

Route::middleware('api')
    ->prefix('v1')
    ->group($apiRoutesPath);
