<?php

use App\Http\Controllers\DeficienciaController;

Route::prefix('deficiencias')->group(function () {
    Route::get('/index', [DeficienciaController::class, 'index'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/show/{id}', [DeficienciaController::class, 'show'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/search/{field}/{value}', [DeficienciaController::class, 'search'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/research/{fieldSearch}/{fieldValue}/{fieldReturn}', [DeficienciaController::class, 'research'])->middleware(['auth:api', 'scope:claudino']);
    Route::post('/store', [DeficienciaController::class, 'store'])->middleware(['auth:api', 'scope:claudino']);
    Route::put('/update/{id}', [DeficienciaController::class, 'update'])->middleware(['auth:api', 'scope:claudino']);
    Route::delete('/destroy/{id}', [DeficienciaController::class, 'destroy'])->middleware(['auth:api', 'scope:claudino']);

    Route::get('/auxiliary/tables', [DeficienciaController::class, 'auxiliary'])->middleware(['auth:api', 'scope:claudino']);
});
