<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionarios';

    protected $fillable = [
        'name',
        'data_nascimento',
        'genero_id',
        'estado_civil_id',
        'escolaridade_id',
        'nacionalidade_id',
        'naturalidade_id',
        'email',
        'pai',
        'mae',
        'telefone_1',
        'telefone_2',
        'celular_1',
        'celular_2',
        'pessoal_identidade_estado_id',
        'pessoal_identidade_orgao_id',
        'pessoal_identidade_numero',
        'pessoal_identidade_data_emissao',
        'profissional_identidade_estado_id',
        'profissional_identidade_orgao_id',
        'profissional_identidade_numero',
        'profissional_identidade_data_emissao',
        'cpf',
        'pis',
        'pasep',
        'carteira_trabalho',
        'cep',
        'numero',
        'complemento',
        'logradouro',
        'bairro',
        'localidade',
        'uf',
        'funcao_id',
        'data_admissao',
        'data_demissao',
        'foto'
    ];

    protected $dates = [
        'data_nascimento',
        'data_admissao',
        'data_demissao',
        'pessoal_identidade_data_emissao',
        'profissional_identidade_data_emissao'
    ];
}
