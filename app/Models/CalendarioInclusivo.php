<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class CalendarioInclusivo extends Model
{
    use HasFactory;

    protected $table = 'calendarios_inclusivos';

    protected $fillable = [
        'data_evento',
        'data_evento_descricao',
        'evento',
        'sugestao_atividade'
    ];

    protected $dates = [
        'data_evento'
    ];

    protected function setDataEventoAttribute($value)
    {
        $this->attributes['data_evento'] = \Carbon\Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    protected function getDataEventoAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
