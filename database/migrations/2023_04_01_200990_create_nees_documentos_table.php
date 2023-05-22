<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeesDocumentosTable extends Migration
{
    public function up()
    {
        Schema::create('nees_documentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nee_id')->constrained('nees');
            $table->string('name');
            $table->string('descricao');
            $table->string('caminho');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nees_documentos');
    }
}
