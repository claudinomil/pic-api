<?php

use App\Http\Controllers\MensagemController;

Route::prefix('mensagens')->group(function () {
    Route::get('/index', [MensagemController::class, 'index'])->middleware(['auth:api', 'scope:claudino']);

    Route::get('/ultimas_conversas', [MensagemController::class, 'ultimas_conversas'])->middleware(['auth:api', 'scope:claudino']);
    Route::post('/enviar_mensagem', [MensagemController::class, 'enviar_mensagem'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/conversas/{remetente_user_id}/{destinatario_user_id}', [MensagemController::class, 'conversas'])->middleware(['auth:api', 'scope:claudino']);



    Route::get('/show/{id}', [MensagemController::class, 'show'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/search/{field}/{value}', [MensagemController::class, 'search'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/research/{fieldSearch}/{fieldValue}/{fieldReturn}', [MensagemController::class, 'research'])->middleware(['auth:api', 'scope:claudino']);
    Route::post('/store', [MensagemController::class, 'store'])->middleware(['auth:api', 'scope:claudino']);
    Route::put('/update/{id}', [MensagemController::class, 'update'])->middleware(['auth:api', 'scope:claudino']);
    Route::delete('/destroy/{id}', [MensagemController::class, 'destroy'])->middleware(['auth:api', 'scope:claudino']);
});
