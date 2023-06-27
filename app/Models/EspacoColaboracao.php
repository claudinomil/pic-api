<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class EspacoColaboracao extends Model
{
    use HasFactory;

    protected $table = 'espacos_colaboracoes';

    protected $fillable = [
        'aluno_id',
        'professor_id',
        'data',
        'hora',
        'observacao_resumo',
        'observacao'
    ];

    protected $dates = [
        'data'
    ];

    protected function setDataAttribute($value)
    {
        $this->attributes['data'] = \Carbon\Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    protected function getDataAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
