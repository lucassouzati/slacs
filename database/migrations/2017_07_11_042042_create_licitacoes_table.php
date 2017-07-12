<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLicitacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licitacoes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('unidade_gestora')->nullable();
            $table->string('num_proc')->nullable();
            $table->string('modalidade')->nullable();
            $table->string('tipo')->nullable();
            $table->string('situacao')->nullable();
            $table->date('data_julgamento')->nullable();
            $table->date('data_homologacao')->nullable();
            $table->text('objeto')->nullable();
            $table->double('valor')->nullable();
            $table->string('criterio')->nullable();
            $table->string('prazo_execucao')->nullable();
            $table->integer('ente_id')->unsigned();
            $table->enum('tipo_cadastro', ['Manual', 'Automático']);
            $table->enum('situacao_cadastro', ['Não validado', 'Validado', 'Reprovado', 'Contestado']);
            $table->integer('colaborador_criou_id')->unsigned();
            $table->integer('colaborador_validou_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('ente_id')->references('id')->on('entes')->onDelete('cascade');
            $table->foreign('colaborador_criou_id')->references('id')->on('colaboradores')->onDelete('cascade');
            $table->foreign('colaborador_validou_id')->references('id')->on('colaboradores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('licitacoes');
    }
}
