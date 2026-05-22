<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('celular');
            $table->string('imagem');
            $table->foreign('id_curso')->references('id')->on('cursos');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
