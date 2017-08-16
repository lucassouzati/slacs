<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContestacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contestacaos', function(Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->enum('status', ['Pendente', 'Respondida']);
            $table->enum('tipo', ['licitacao', 'contrato']);
            $table->text('observacao');
            $table->text('resposta')->nullable();
            $table->integer('licitacao_id')->unsigned()->nullable();
            $table->integer('contrato_id')->unsigned()->nullable();
            $table->integer('cidadao_id')->unsigned()->nullable();
            $table->integer('colaborador_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('licitacao_id')->references('id')->on('licitacoes')->onDelete('cascade');
            $table->foreign('contrato_id')->references('id')->on('contratos')->onDelete('cascade');
            $table->foreign('cidadao_id')->references('id')->on('cidadaos')->onDelete('cascade');
            $table->foreign('colaborador_id')->references('id')->on('colaboradores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contestacaos');
    }
}
