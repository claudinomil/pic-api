<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class CalendarioInclusivoPdf extends Model
{
    use HasFactory;

    protected $table = 'calendarios_inclusivos_pdfs';

    protected $fillable = [
        'calendario_inclusivo_id',
        'name',
        'descricao',
        'caminho'
    ];
}
