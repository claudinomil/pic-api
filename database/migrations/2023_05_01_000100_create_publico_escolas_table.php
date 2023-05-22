<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicoEscolasTable extends Migration
{
    public function up()
    {
        Schema::create('publico_escolas', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable();
            $table->string('diretor')->nullable();
            $table->string('endereco')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->text('motivo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('publico_escolas');
    }
}
