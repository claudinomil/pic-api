<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('data_nascimento');
            $table->foreignId('genero_id')->constrained('generos');
            $table->foreignId('turma_id')->constrained('turmas');
            $table->foreignId('raca_id')->constrained('racas');
            $table->foreignId('nacionalidade_id')->nullable()->constrained('nacionalidades');
            $table->foreignId('naturalidade_id')->nullable()->constrained('naturalidades');
            $table->string('pai')->nullable();
            $table->string('mae')->nullable();
            $table->string('telefone_pai')->nullable();
            $table->string('telefone_mae')->nullable();
            $table->string('responsavel_legal_nome')->nullable();
            $table->string('responsavel_legal_parentesco')->nullable();
            $table->string('responsavel_legal_telefone')->nullable();
            $table->string('responsavel_legal_celular')->nullable();
            $table->string('problema_saude')->nullable();
            $table->string('problema_saude_descricao')->nullable();
            $table->string('acompanhamento_saude')->nullable();
            $table->string('acompanhamento_saude_descricao')->nullable();
            $table->string('medicamento_controlado')->nullable();
            $table->string('medicamento_controlado_descricao')->nullable();
            $table->string('laudo_deficiencia_ou_transtorno')->nullable();
            $table->string('laudo_deficiencia_ou_transtorno_descricao')->nullable();
            $table->string('cpf', 11)->unique();
            $table->string('cep')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('logradouro')->nullable();
            $table->string('bairro')->nullable();
            $table->string('localidade')->nullable();
            $table->string('uf')->nullable();
            $table->text('foto')->nullable();
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
        Schema::dropIfExists('alunos');
    }
}
