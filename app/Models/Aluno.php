<?php

namespace App\Models;

use Carbon\Carbon;
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
        'data_matricula',
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
        'laudo_nee_ou_transtorno',
        'laudo_nee_ou_transtorno_descricao',
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

    protected function setDataNascimentoAttribute($value)
    {
        if ($value != '') {
            $this->attributes['data_nascimento'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        }
    }

    protected function getDataNascimentoAttribute($value)
    {
        return \Illuminate\Support\Carbon::parse($value)->format('d/m/Y');
    }

    protected function setDataMatriculaAttribute($value)
    {
        if ($value != '') {
            $this->attributes['data_matricula'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        }
    }

    protected function getDataMatriculaAttribute($value)
    {
        return \Illuminate\Support\Carbon::parse($value)->format('d/m/Y');
    }

    protected function setFotoAttribute($value)
    {
        if ($value == '') {
            $this->attributes['foto'] = 'build/assets/images/alunos/aluno-0.png';
        } else {
            $this->attributes['foto'] = $value;
        }
    }
}
