<?php

namespace App\Observers;

use App\Facades\Transacoes;
use App\Models\Avaliacao;

class AvaliacaoObserver
{
    public function created(Avaliacao $avaliacao)
    {
        //gravar transacao
        Transacoes::transacaoRecord(1, 'avaliacoes', $avaliacao, $avaliacao);
    }

    public function updated(Avaliacao $avaliacao)
    {
        //gravar transacao
        $beforeData = $avaliacao->getOriginal();
        $laterData = $avaliacao->getAttributes();

        Transacoes::transacaoRecord(2, 'avaliacoes', $beforeData, $laterData);
    }

    public function deleted(Avaliacao $avaliacao)
    {
        //gravar transacao
        Transacoes::transacaoRecord(3, 'avaliacoes', $avaliacao, $avaliacao);
    }
}
