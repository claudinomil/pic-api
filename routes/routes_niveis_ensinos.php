<?php

use App\Http\Controllers\NivelEnsinoController;

Route::prefix('niveis_ensinos')->group(function () {
    Route::get('/index', [NivelEnsinoController::class, 'index'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/show/{id}', [NivelEnsinoController::class, 'show'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/search/{field}/{value}', [NivelEnsinoController::class, 'search'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/research/{fieldSearch}/{fieldValue}/{fieldReturn}', [NivelEnsinoController::class, 'research'])->middleware(['auth:api', 'scope:claudino']);
    Route::post('/store', [NivelEnsinoController::class, 'store'])->middleware(['auth:api', 'scope:claudino']);
    Route::put('/update/{id}', [NivelEnsinoController::class, 'update'])->middleware(['auth:api', 'scope:claudino']);
    Route::delete('/destroy/{id}', [NivelEnsinoController::class, 'destroy'])->middleware(['auth:api', 'scope:claudino']);
});
