<?php

namespace App\Observers;

use App\Facades\Transacoes;
use App\Models\SobreProduto;

class SobreProdutoObserver
{
    public function updated(SobreProduto $sobre_produto)
    {
        //gravar transacao
        $beforeData = $sobre_produto->getOriginal();
        $laterData = $sobre_produto->getAttributes();

        Transacoes::transacaoRecord(2, 'sobre_produto', $beforeData, $laterData);
    }
}
