<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlunoNee extends Model
{
    use HasFactory;

    protected $table = 'alunos_nees';

    protected $fillable = [
        'aluno_id',
        'nee_id'
    ];
}
