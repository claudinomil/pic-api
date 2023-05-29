<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendariosInclusivosTable extends Migration
{
    public function up()
    {
        Schema::create('calendarios_inclusivos', function (Blueprint $table) {
            $table->id();
            $table->date('data_evento');
            $table->string('data_evento_descricao')->nullable();
            $table->string('evento');
            $table->text('sugestao_atividade')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('calendarios_inclusivos');
    }
}
