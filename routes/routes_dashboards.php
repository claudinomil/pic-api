<?php

use App\Http\Controllers\DashboardController;

Route::prefix('dashboards')->group(function () {
    Route::get('/index/{data}', [DashboardController::class, 'index'])->middleware(['auth:api', 'scope:claudino']);
});
