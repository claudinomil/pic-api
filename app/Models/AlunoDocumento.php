<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlunoDocumento extends Model
{
    use HasFactory;

    protected $table = 'alunos_documentos';

    protected $fillable = [
        'aluno_id',
        'name',
        'descricao',
        'caminho'
    ];
}
