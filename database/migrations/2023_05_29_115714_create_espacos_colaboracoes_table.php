<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspacosColaboracoesTable extends Migration
{
    public function up()
    {
        Schema::create('espacos_colaboracoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aluno_id')->constrained('alunos');
            $table->foreignId('professor_id')->constrained('professores');
            $table->date('data')->default(date('Y-m-d'));
            $table->time('hora')->default(date('H:i:s'));
            $table->string('observacao_resumo');
            $table->text('observacao');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('espacos_colaboracoes');
    }
}
