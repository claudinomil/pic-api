<?php

namespace App\Observers;

use App\Facades\Transacoes;
use App\Models\EspacoColaboracao;

class EspacoColaboracaoObserver
{
    public function created(EspacoColaboracao $espaco_colaboracao)
    {
        //gravar transacao
        Transacoes::transacaoRecord(1, 'espacos_colaboracoes', $espaco_colaboracao, $espaco_colaboracao);
    }

    public function updated(EspacoColaboracao $espaco_colaboracao)
    {
        //gravar transacao
        $beforeData = $espaco_colaboracao->getOriginal();
        $laterData = $espaco_colaboracao->getAttributes();

        Transacoes::transacaoRecord(2, 'espacos_colaboracoes', $beforeData, $laterData);
    }

    public function deleted(EspacoColaboracao $espaco_colaboracao)
    {
        //gravar transacao
        Transacoes::transacaoRecord(3, 'espacos_colaboracoes', $espaco_colaboracao, $espaco_colaboracao);
    }
}
