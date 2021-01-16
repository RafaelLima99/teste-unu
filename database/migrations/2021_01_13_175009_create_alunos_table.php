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
            $table->string('nome', 200);
            $table->char('dataNasc', 10);
            $table->char('telefone', 13);
            $table->unsignedBigInteger('id_serie');
            $table->foreign('id_serie')->references('id')->on('series');
            $table->string('cidade', 100);
            $table->string('estado', 100);
            $table->char('cep', 8);
            $table->boolean('status');
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
