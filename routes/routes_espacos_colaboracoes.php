<?php

use App\Http\Controllers\EspacoColaboracaoController;

Route::prefix('espacos_colaboracoes')->group(function () {
    Route::get('/index', [EspacoColaboracaoController::class, 'index'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/show/{id}', [EspacoColaboracaoController::class, 'show'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/search/{field}/{value}', [EspacoColaboracaoController::class, 'search'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/research/{fieldSearch}/{fieldValue}/{fieldReturn}', [EspacoColaboracaoController::class, 'research'])->middleware(['auth:api', 'scope:claudino']);
    Route::post('/store', [EspacoColaboracaoController::class, 'store'])->middleware(['auth:api', 'scope:claudino']);
    Route::put('/update/{id}', [EspacoColaboracaoController::class, 'update'])->middleware(['auth:api', 'scope:claudino']);
    Route::delete('/destroy/{id}', [EspacoColaboracaoController::class, 'destroy'])->middleware(['auth:api', 'scope:claudino']);

    Route::get('/auxiliary/tables', [EspacoColaboracaoController::class, 'auxiliary'])->middleware(['auth:api', 'scope:claudino']);
});
