<?php

use App\Http\Controllers\AvaliacaoController;

Route::prefix('avaliacoes')->group(function () {
    Route::get('/index', [AvaliacaoController::class, 'index'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/show/{id}', [AvaliacaoController::class, 'show'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/search/{field}/{value}', [AvaliacaoController::class, 'search'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/research/{fieldSearch}/{fieldValue}/{fieldReturn}', [AvaliacaoController::class, 'research'])->middleware(['auth:api', 'scope:claudino']);
    Route::post('/store', [AvaliacaoController::class, 'store'])->middleware(['auth:api', 'scope:claudino']);
    Route::put('/update/{id}', [AvaliacaoController::class, 'update'])->middleware(['auth:api', 'scope:claudino']);
    Route::delete('/destroy/{id}', [AvaliacaoController::class, 'destroy'])->middleware(['auth:api', 'scope:claudino']);

    //Avaliações - Entrar direto no Create''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
    Route::get('/avaliar_user/{user_id}', [AvaliacaoController::class, 'avaliar_user'])->middleware(['auth:api', 'scope:claudino']);
    //''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
});
