<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $table = 'turmas';

    protected $fillable = [
        'name',
        'escola_id',
        'nivel_ensino_id',
        'professor_id',
        'quantidade_alunos',
        'sala'
    ];
}
