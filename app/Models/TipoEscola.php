<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEscola extends Model
{
    use HasFactory;

    protected $table = 'tipos_escolas';

    protected $fillable = [
        'name',
        'ordenacao'
    ];
}
