<?php

use App\Http\Controllers\AlunoController;

Route::prefix('alunos')->group(function () {
    Route::get('/index', [AlunoController::class, 'index'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/show/{id}', [AlunoController::class, 'show'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/search/{field}/{value}', [AlunoController::class, 'search'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/research/{fieldSearch}/{fieldValue}/{fieldReturn}', [AlunoController::class, 'research'])->middleware(['auth:api', 'scope:claudino']);
    Route::post('/store', [AlunoController::class, 'store'])->middleware(['auth:api', 'scope:claudino']);
    Route::put('/update/{id}', [AlunoController::class, 'update'])->middleware(['auth:api', 'scope:claudino']);
    Route::delete('/destroy/{id}', [AlunoController::class, 'destroy'])->middleware(['auth:api', 'scope:claudino']);

    Route::get('/auxiliary/tables', [AlunoController::class, 'auxiliary'])->middleware(['auth:api', 'scope:claudino']);

    Route::put('/updatefoto/{id}', [AlunoController::class, 'updateFoto'])->middleware(['auth:api', 'scope:claudino']);

    Route::get('/extradata/{id}', [AlunoController::class, 'extraData'])->middleware(['auth:api', 'scope:claudino']);

    Route::post('/store/documentos', [AlunoController::class, 'store_documentos'])->middleware(['auth:api', 'scope:claudino']);
    Route::delete('/deletar_documento/destroy/{id}', [AlunoController::class, 'deletar_documento'])->middleware(['auth:api', 'scope:claudino']);
});
