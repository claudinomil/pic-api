<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('modulos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('menu_text');
            $table->string('menu_url')->unique();
            $table->string('menu_route')->unique();
            $table->string('menu_icon')->unique();
            $table->integer('mobile')->default(0);
            $table->integer('viewing_order');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('modulos');
    }
};
