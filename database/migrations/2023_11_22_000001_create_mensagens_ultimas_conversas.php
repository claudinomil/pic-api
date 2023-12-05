<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mensagens_ultimas_conversas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('remetente_user_id')->constrained('users');
            $table->foreignId('destinatario_user_id')->constrained('users');
            $table->text('mensagem');
            $table->date('data_envio')->nullable();
            $table->time('hora_envio')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mensagens_ultimas_conversas');
    }
};
