<?php

use App\Http\Controllers\MensagemController;

Route::prefix('mensagens')->group(function () {
    Route::get('/index', [MensagemController::class, 'index'])->middleware(['auth:api', 'scope:claudino']);

    Route::post('/atualizar', [MensagemController::class, 'atualizar'])->middleware(['auth:api', 'scope:claudino']);
});
