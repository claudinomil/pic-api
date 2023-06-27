<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSobreProdutoTable extends Migration
{
    public function up()
    {
        Schema::create('sobre_produto', function (Blueprint $table) {
            $table->id();
            $table->text('descricao')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sobre_produto');
    }
}
