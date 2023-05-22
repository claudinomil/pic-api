<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeeDocumento extends Model
{
    use HasFactory;

    protected $table = 'nees_documentos';

    protected $fillable = [
        'nee_id',
        'name',
        'descricao',
        'caminho'
    ];
}
