<?php

use App\Http\Controllers\TipoEscolaController;

Route::prefix('tipos_escolas')->group(function () {
    Route::get('/index', [TipoEscolaController::class, 'index'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/show/{id}', [TipoEscolaController::class, 'show'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/search/{field}/{value}', [TipoEscolaController::class, 'search'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/research/{fieldSearch}/{fieldValue}/{fieldReturn}', [TipoEscolaController::class, 'research'])->middleware(['auth:api', 'scope:claudino']);
    Route::post('/store', [TipoEscolaController::class, 'store'])->middleware(['auth:api', 'scope:claudino']);
    Route::put('/update/{id}', [TipoEscolaController::class, 'update'])->middleware(['auth:api', 'scope:claudino']);
    Route::delete('/destroy/{id}', [TipoEscolaController::class, 'destroy'])->middleware(['auth:api', 'scope:claudino']);
});
