<?php

use App\Http\Controllers\PublicoEscolaController;

Route::prefix('publico_escolas')->group(function () {
    Route::post('/store', [PublicoEscolaController::class, 'store']);
});
