<?php

namespace App\Observers;

use App\Facades\Transacoes;
use App\Models\Turma;

class TurmaObserver
{
    public function created(Turma $turma)
    {
        //gravar transacao
        Transacoes::transacaoRecord(1, 'turmas', $turma, $turma);
    }

    public function updated(Turma $turma)
    {
        //gravar transacao
        $beforeData = $turma->getOriginal();
        $laterData = $turma->getAttributes();

        Transacoes::transacaoRecord(2, 'turmas', $beforeData, $laterData);
    }

    public function deleted(Turma $turma)
    {
        //gravar transacao
        Transacoes::transacaoRecord(3, 'turmas', $turma, $turma);
    }
}
