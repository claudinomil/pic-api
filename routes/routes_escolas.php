<?php

use App\Http\Controllers\EscolaController;

Route::prefix('escolas')->group(function () {
    Route::get('/index', [EscolaController::class, 'index'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/show/{id}', [EscolaController::class, 'show'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/search/{field}/{value}', [EscolaController::class, 'search'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/research/{fieldSearch}/{fieldValue}/{fieldReturn}', [EscolaController::class, 'research'])->middleware(['auth:api', 'scope:claudino']);
    Route::post('/store', [EscolaController::class, 'store'])->middleware(['auth:api', 'scope:claudino']);
    Route::put('/update/{id}', [EscolaController::class, 'update'])->middleware(['auth:api', 'scope:claudino']);
    Route::delete('/destroy/{id}', [EscolaController::class, 'destroy'])->middleware(['auth:api', 'scope:claudino']);

    Route::get('/auxiliary/tables', [EscolaController::class, 'auxiliary'])->middleware(['auth:api', 'scope:claudino']);
});
