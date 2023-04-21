<?php

namespace App\Observers;

use App\Facades\Transacoes;
use App\Models\Escola;

class EscolaObserver
{
    public function created(Escola $escola)
    {
        //gravar transacao
        Transacoes::transacaoRecord(1, 'escolas', $escola, $escola);
    }

    public function updated(Escola $escola)
    {
        //gravar transacao
        $beforeData = $escola->getOriginal();
        $laterData = $escola->getAttributes();

        Transacoes::transacaoRecord(2, 'escolas', $beforeData, $laterData);
    }

    public function deleted(Escola $escola)
    {
        //gravar transacao
        Transacoes::transacaoRecord(3, 'escolas', $escola, $escola);
    }
}
