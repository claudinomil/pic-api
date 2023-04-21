<?php

namespace App\Observers;

use App\Facades\Transacoes;
use App\Models\Aluno;

class AlunoObserver
{
    public function created(Aluno $aluno)
    {
        //gravar transacao
        Transacoes::transacaoRecord(1, 'alunos', $aluno, $aluno);
    }

    public function updated(Aluno $aluno)
    {
        //gravar transacao
        $beforeData = $aluno->getOriginal();
        $laterData = $aluno->getAttributes();

        Transacoes::transacaoRecord(2, 'alunos', $beforeData, $laterData);
    }

    public function deleted(Aluno $aluno)
    {
        //gravar transacao
        Transacoes::transacaoRecord(3, 'alunos', $aluno, $aluno);
    }
}
