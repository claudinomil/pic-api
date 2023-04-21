<?php

use App\Http\Controllers\ProfessorController;

Route::prefix('professores')->group(function () {
    Route::get('/index', [ProfessorController::class, 'index'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/show/{id}', [ProfessorController::class, 'show'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/search/{field}/{value}', [ProfessorController::class, 'search'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/research/{fieldSearch}/{fieldValue}/{fieldReturn}', [ProfessorController::class, 'research'])->middleware(['auth:api', 'scope:claudino']);
    Route::post('/store', [ProfessorController::class, 'store'])->middleware(['auth:api', 'scope:claudino']);
    Route::put('/update/{id}', [ProfessorController::class, 'update'])->middleware(['auth:api', 'scope:claudino']);
    Route::delete('/destroy/{id}', [ProfessorController::class, 'destroy'])->middleware(['auth:api', 'scope:claudino']);

    Route::get('/auxiliary/tables', [ProfessorController::class, 'auxiliary'])->middleware(['auth:api', 'scope:claudino']);

    Route::put('/updatefoto/{id}', [ProfessorController::class, 'updateFoto'])->middleware(['auth:api', 'scope:claudino']);

    Route::get('/extradata/{id}', [ProfessorController::class, 'extraData'])->middleware(['auth:api', 'scope:claudino']);
});
