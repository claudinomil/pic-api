<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class Avaliacao extends Model
{
    use HasFactory;

    protected $table = 'avaliacoes';

    protected $fillable = [
        'resposta_pergunta_1',
        'resposta_pergunta_2',
        'resposta_pergunta_3',
        'data_avaliacao',
        'hora_avaliacao',
        'user_id'
    ];

    protected function getDataAvaliacaoAttribute($value) {
        return Carbon::parse($value)->format('d/m/Y');
    }

    protected function getHoraAvaliacaoAttribute($value) {
        return Carbon::parse($value)->format('H:i');
    }

    protected function setUserIdAttribute($value) {
        $this->attributes['user_id'] = Auth::user()->id;
    }
}
