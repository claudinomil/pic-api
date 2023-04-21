<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $table = 'alunos';

    protected $fillable = [
        'name',
        'data_nascimento',
        'genero_id',
        'turma_id',
        'raca_id',
        'nacionalidade_id',
        'naturalidade_id',
        'pai',
        'mae',
        'telefone_pai',
        'telefone_mae',
        'cpf',
        'responsavel_legal_nome',
        'responsavel_legal_parentesco',
        'responsavel_legal_telefone',
        'responsavel_legal_celular',
        'problema_saude',
        'problema_saude_descricao',
        'acompanhamento_saude',
        'acompanhamento_saude_descricao',
        'medicamento_controlado',
        'medicamento_controlado_descricao',
        'laudo_deficiencia_ou_transtorno',
        'laudo_deficiencia_ou_transtorno_descricao',
        'cep',
        'numero',
        'complemento',
        'logradouro',
        'bairro',
        'localidade',
        'uf',
        'foto'
    ];

    protected $dates = [
        'data_nascimento'
    ];
}
