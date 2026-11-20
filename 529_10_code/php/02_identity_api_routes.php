// Modules/Identity/Presentation/Routes/api.php

use Illuminate\Support\Facades\Route;
use Modules\Identity\Presentation\Http\Controllers\Users\CreateUserController;
use Modules\Identity\Presentation\Http\Controllers\Users\ListUsersController;
use Modules\Identity\Presentation\Http\Controllers\Users\ShowUserController;

Route::prefix('v1')->group(function () {
    Route::get('/users', ListUsersController::class);
    Route::get('/users/{userId}', ShowUserController::class);
    Route::post('/users', CreateUserController::class);
});
