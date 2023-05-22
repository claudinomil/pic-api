<?php

namespace App\Observers;

use App\Facades\Transacoes;
use App\Models\Nee;

class NeeObserver
{
    public function created(Nee $nee)
    {
        //gravar transacao
        Transacoes::transacaoRecord(1, 'nees', $nee, $nee);
    }

    public function updated(Nee $nee)
    {
        //gravar transacao
        $beforeData = $nee->getOriginal();
        $laterData = $nee->getAttributes();

        Transacoes::transacaoRecord(2, 'nees', $beforeData, $laterData);
    }

    public function deleted(Nee $nee)
    {
        //gravar transacao
        Transacoes::transacaoRecord(3, 'nees', $nee, $nee);
    }
}
