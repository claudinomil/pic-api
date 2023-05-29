<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicoEscola extends Model
{
    use HasFactory;

    protected $table = 'publico_escolas';

    protected $fillable = [
        'nome',
        'diretor',
        'endereco',
        'telefone',
        'celular',
        'email',
        'motivo'
    ];
}
