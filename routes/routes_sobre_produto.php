<?php

use App\Http\Controllers\SobreProdutoController;

Route::prefix('sobre_produto')->group(function () {
    Route::get('/show/{id}', [SobreProdutoController::class, 'show'])->middleware(['auth:api', 'scope:claudino']);
    Route::put('/update/{id}', [SobreProdutoController::class, 'update'])->middleware(['auth:api', 'scope:claudino']);
});
