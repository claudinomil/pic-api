<?php

use App\Http\Controllers\NeeController;

Route::prefix('nees')->group(function () {
    Route::get('/index', [NeeController::class, 'index'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/show/{id}', [NeeController::class, 'show'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/search/{field}/{value}', [NeeController::class, 'search'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/research/{fieldSearch}/{fieldValue}/{fieldReturn}', [NeeController::class, 'research'])->middleware(['auth:api', 'scope:claudino']);
    Route::post('/store', [NeeController::class, 'store'])->middleware(['auth:api', 'scope:claudino']);
    Route::put('/update/{id}', [NeeController::class, 'update'])->middleware(['auth:api', 'scope:claudino']);
    Route::delete('/destroy/{id}', [NeeController::class, 'destroy'])->middleware(['auth:api', 'scope:claudino']);

    Route::get('/auxiliary/tables', [NeeController::class, 'auxiliary'])->middleware(['auth:api', 'scope:claudino']);

    Route::post('/store/documentos', [NeeController::class, 'store_documentos'])->middleware(['auth:api', 'scope:claudino']);
    Route::delete('/deletar_documento/destroy/{id}', [NeeController::class, 'deletar_documento'])->middleware(['auth:api', 'scope:claudino']);
});
