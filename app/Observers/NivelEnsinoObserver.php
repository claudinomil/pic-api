<?php

namespace App\Observers;

use App\Facades\Transacoes;
use App\Models\NivelEnsino;

class NivelEnsinoObserver
{
    public function created(NivelEnsino $nivelensino)
    {
        //gravar transacao
        Transacoes::transacaoRecord(1, 'niveis_ensinos', $nivelensino, $nivelensino);
    }

    public function updated(NivelEnsino $nivelensino)
    {
        //gravar transacao
        $beforeData = $nivelensino->getOriginal();
        $laterData = $nivelensino->getAttributes();

        Transacoes::transacaoRecord(2, 'niveis_ensinos', $beforeData, $laterData);
    }

    public function deleted(NivelEnsino $nivelensino)
    {
        //gravar transacao
        Transacoes::
        transacaoRecord(3, 'niveis_ensinos', $nivelensino, $nivelensino);
    }
}
