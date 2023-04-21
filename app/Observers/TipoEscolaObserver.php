<?php

namespace App\Observers;

use App\Facades\Transacoes;
use App\Models\TipoEscola;

class TipoEscolaObserver
{
    public function created(TipoEscola $tipoescola)
    {
        //gravar transacao
        Transacoes::transacaoRecord(1, 'tipos_escolas', $tipoescola, $tipoescola);
    }

    public function updated(TipoEscola $tipoescola)
    {
        //gravar transacao
        $beforeData = $tipoescola->getOriginal();
        $laterData = $tipoescola->getAttributes();

        Transacoes::transacaoRecord(2, 'tipos_escolas', $beforeData, $laterData);
    }

    public function deleted(TipoEscola $tipoescola)
    {
        //gravar transacao
        Transacoes::
        transacaoRecord(3, 'tipos_escolas', $tipoescola, $tipoescola);
    }
}
