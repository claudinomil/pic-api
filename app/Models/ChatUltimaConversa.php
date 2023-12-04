<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatUltimaConversa extends Model
{
    use HasFactory;

    protected $table = 'chats_ultimas_conversas';

    protected $fillable = [
        'remetente_user_id',
        'destinatario_user_id',
        'mensagem',
        'data_envio',
        'hora_envio'
    ];

    protected $dates = [
        'data_envio'
    ];

    protected function setDataEnvioAttribute($value) {$this->attributes['data_envio'] = date('Y-m-d');}
    protected function getDataEnvioAttribute($value) {return \Illuminate\Support\Carbon::parse($value)->format('d/m/Y');}

    protected function setHoraEnvioAttribute($value) {$this->attributes['hora_envio'] = date('H:i:s');}
}
