<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'chats';

    protected $fillable = [
        'remetente_user_id',
        'destinatario_user_id',
        'mensagem',
        'data_envio',
        'hora_envio',
        'data_recebimento',
        'hora_recebimento',
        'data_leitura',
        'hora_leitura'
    ];

    protected $dates = [
        'data_envio',
        'data_recebimento',
        'data_leitura'
    ];

    protected function setDataEnvioAttribute($value) {$this->attributes['data_envio'] = date('Y-m-d');}
    protected function getDataEnvioAttribute($value) {
        if ($value !== NULL) {
            return \Illuminate\Support\Carbon::parse($value)->format('d/m/Y');
        }
    }

    protected function setHoraEnvioAttribute($value) {$this->attributes['hora_envio'] = date('H:i:s');}

    protected function setDataRecebimentoAttribute($value) {$this->attributes['data_recebimento'] = date('Y-m-d');}
    protected function getDataRecebimentoAttribute($value) {
        if ($value !== NULL) {
            return \Illuminate\Support\Carbon::parse($value)->format('d/m/Y');
        }
    }

    protected function setHoraRecebimentoAttribute($value) {$this->attributes['hora_recebimento'] = date('H:i:s');}

    protected function setDataLeituraAttribute($value) {$this->attributes['data_leitura'] = date('Y-m-d');}
    protected function getDataLeituraAttribute($value) {
        if ($value !== NULL) {
            return \Illuminate\Support\Carbon::parse($value)->format('d/m/Y');
        }
    }

    protected function setHoraLeituraAttribute($value) {$this->attributes['hora_leitura'] = date('H:i:s');}
}
