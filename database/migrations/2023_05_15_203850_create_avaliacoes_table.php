<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacoesTable extends Migration
{
    public function up()
    {
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->id();
            $table->integer('resposta_pergunta_1'); //As informações disponibilizadas no site contribuíram para a sua prática profissional com crianças com necessidades educacionais especiais?
            $table->integer('resposta_pergunta_2'); //A plataforma contribuiu no processo de colaboração entre você e a professora da Sala de Recursos?
            $table->text('resposta_pergunta_3'); //Quais os aspéctos a serem melhorados quanto ao conteúdo e à estrutura do site?
            $table->date('data_avaliacao')->default(date('Y-m-d'));
            $table->time('hora_avaliacao')->default(date('H:i'));
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('avaliacoes');
    }
}
