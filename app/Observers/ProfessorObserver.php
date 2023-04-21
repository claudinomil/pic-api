<?php

namespace App\Observers;

use App\Facades\Transacoes;
use App\Models\Professor;

class ProfessorObserver
{
    public function created(Professor $professor)
    {
        //gravar transacao
        Transacoes::transacaoRecord(1, 'professores', $professor, $professor);
    }

    public function updated(Professor $professor)
    {
        //gravar transacao
        $beforeData = $professor->getOriginal();
        $laterData = $professor->getAttributes();

        Transacoes::transacaoRecord(2, 'professores', $beforeData, $laterData);
    }

    public function deleted(Professor $professor)
    {
        //gravar transacao
        Transacoes::transacaoRecord(3, 'professores', $professor, $professor);
    }
}
