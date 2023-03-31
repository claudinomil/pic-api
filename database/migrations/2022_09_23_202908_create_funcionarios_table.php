<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->date('data_nascimento');
            $table->foreignId('genero_id')->constrained('generos');
            $table->foreignId('estado_civil_id')->nullable()->constrained('estados_civis');
            $table->foreignId('escolaridade_id')->nullable()->constrained('escolaridades');
            $table->foreignId('nacionalidade_id')->nullable()->constrained('nacionalidades');
            $table->foreignId('naturalidade_id')->nullable()->constrained('naturalidades');
            $table->string('email')->nullable()->unique();
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->string('telephone_1')->nullable();
            $table->string('telephone_2')->nullable();
            $table->string('cellular_1')->nullable();
            $table->string('cellular_2')->nullable();
            $table->foreignId('personal_identidade_estado_id')->nullable()->constrained('estados');
            $table->foreignId('personal_identidade_orgao_id')->nullable()->constrained('identidade_orgaos');
            $table->string('personal_identidade_numero')->nullable();
            $table->date('personal_identidade_data_emissao')->nullable();
            $table->foreignId('professional_identidade_estado_id')->nullable()->constrained('estados');
            $table->foreignId('professional_identidade_orgao_id')->nullable()->constrained('identidade_orgaos');
            $table->string('professional_identidade_numero')->nullable();
            $table->date('professional_identidade_data_emissao')->nullable();
            $table->string('cpf', 11)->unique();
            $table->string('pis', 11)->nullable()->unique();
            $table->string('pasep', 11)->nullable()->unique();
            $table->string('carteira_trabalho', 11)->nullable()->unique();
            $table->string('cep')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('logradouro')->nullable();
            $table->string('bairro')->nullable();
            $table->string('localidade')->nullable();
            $table->string('uf')->nullable();
            $table->foreignId('funcao_id')->nullable()->constrained('funcoes');
            $table->date('data_admissao');
            $table->date('data_demissao')->nullable();
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
        Schema::dropIfExists('funcionarios');
    }
}
