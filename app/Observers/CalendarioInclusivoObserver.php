<?php

namespace App\Observers;

use App\Facades\Transacoes;
use App\Models\CalendarioInclusivo;

class CalendarioInclusivoObserver
{
    public function created(CalendarioInclusivo $calendario_inclusivo)
    {
        //gravar transacao
        Transacoes::transacaoRecord(1, 'calendarios_inclusivos', $calendario_inclusivo, $calendario_inclusivo);
    }

    public function updated(CalendarioInclusivo $calendario_inclusivo)
    {
        //gravar transacao
        $beforeData = $calendario_inclusivo->getOriginal();
        $laterData = $calendario_inclusivo->getAttributes();

        Transacoes::transacaoRecord(2, 'calendarios_inclusivos', $beforeData, $laterData);
    }

    public function deleted(CalendarioInclusivo $calendario_inclusivo)
    {
        //gravar transacao
        Transacoes::transacaoRecord(3, 'calendarios_inclusivos', $calendario_inclusivo, $calendario_inclusivo);
    }
}
