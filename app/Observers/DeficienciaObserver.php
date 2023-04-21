<?php

namespace App\Observers;

use App\Facades\Transacoes;
use App\Models\Deficiencia;

class DeficienciaObserver
{
    public function created(Deficiencia $deficiencia)
    {
        //gravar transacao
        Transacoes::transacaoRecord(1, 'deficiencias', $deficiencia, $deficiencia);
    }

    public function updated(Deficiencia $deficiencia)
    {
        //gravar transacao
        $beforeData = $deficiencia->getOriginal();
        $laterData = $deficiencia->getAttributes();

        Transacoes::transacaoRecord(2, 'deficiencias', $beforeData, $laterData);
    }

    public function deleted(Deficiencia $deficiencia)
    {
        //gravar transacao
        Transacoes::transacaoRecord(3, 'deficiencias', $deficiencia, $deficiencia);
    }
}
