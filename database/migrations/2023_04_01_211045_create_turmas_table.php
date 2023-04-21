<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('escola_id')->constrained('escolas');
            $table->foreignId('nivel_ensino_id')->nullable()->constrained('niveis_ensinos');
            $table->foreignId('professor_id')->nullable()->constrained('professores');
            $table->integer('quantidade_alunos');
            $table->string('sala');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turmas');
    }
}
