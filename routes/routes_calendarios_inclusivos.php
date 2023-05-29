<?php

use App\Http\Controllers\CalendarioInclusivoController;

Route::prefix('calendarios_inclusivos')->group(function () {
    Route::get('/index', [CalendarioInclusivoController::class, 'index'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/show/{id}', [CalendarioInclusivoController::class, 'show'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/search/{field}/{value}', [CalendarioInclusivoController::class, 'search'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/research/{fieldSearch}/{fieldValue}/{fieldReturn}', [CalendarioInclusivoController::class, 'research'])->middleware(['auth:api', 'scope:claudino']);
    Route::post('/store', [CalendarioInclusivoController::class, 'store'])->middleware(['auth:api', 'scope:claudino']);
    Route::put('/update/{id}', [CalendarioInclusivoController::class, 'update'])->middleware(['auth:api', 'scope:claudino']);
    Route::delete('/destroy/{id}', [CalendarioInclusivoController::class, 'destroy'])->middleware(['auth:api', 'scope:claudino']);

    Route::get('/auxiliary/tables', [CalendarioInclusivoController::class, 'auxiliary'])->middleware(['auth:api', 'scope:claudino']);

    Route::post('/store/pdfs', [CalendarioInclusivoController::class, 'store_pdfs'])->middleware(['auth:api', 'scope:claudino']);
    Route::delete('/deletar_pdf/destroy/{id}', [CalendarioInclusivoController::class, 'deletar_pdf'])->middleware(['auth:api', 'scope:claudino']);
});
