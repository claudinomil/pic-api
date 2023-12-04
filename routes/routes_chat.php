<?php

use App\Http\Controllers\ChatController;

Route::prefix('chat')->group(function () {
    Route::get('/usuario_logado', [ChatController::class, 'usuario_logado'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/novas_conversas', [ChatController::class, 'novas_conversas'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/ultimas_conversas', [ChatController::class, 'ultimas_conversas'])->middleware(['auth:api', 'scope:claudino']);
    Route::get('/conversas/{remetente_user_id}/{destinatario_user_id}', [ChatController::class, 'conversas'])->middleware(['auth:api', 'scope:claudino']);
    Route::post('/enviar_mensagem', [ChatController::class, 'enviar_mensagem'])->middleware(['auth:api', 'scope:claudino']);
    Route::put('/gravar_como_lida/{id}', [ChatController::class, 'gravar_como_lida'])->middleware(['auth:api', 'scope:claudino']);
    Route::put('/gravar_como_recebidas', [ChatController::class, 'gravar_como_recebidas'])->middleware(['auth:api', 'scope:claudino']);
});
