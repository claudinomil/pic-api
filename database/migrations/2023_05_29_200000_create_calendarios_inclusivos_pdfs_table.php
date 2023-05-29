<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendariosInclusivosPdfsTable extends Migration
{
    public function up()
    {
        Schema::create('calendarios_inclusivos_pdfs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('calendario_inclusivo_id')->constrained('calendarios_inclusivos');
            $table->string('name');
            $table->string('descricao');
            $table->string('caminho');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('calendarios_inclusivos_pdfs');
    }
}
