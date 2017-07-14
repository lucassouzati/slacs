<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('unidade_gestora')->nullable();
            $table->date('data_emissao');
            $table->date('data_expiracao');
            $table->string('instrumento_contrato')->nullable();
            $table->string('numero_contrato')->nullable();
            $table->string('tipo')->nullable();
            $table->string('cnpj_cpf');
            $table->string('fornecedor')->nullable();
            $table->string('processo')->nullable();
            $table->boolean('teve_aditivo')->default(0);
            $table->double('valor');
            $table->text('descricao')->nullable();
            $table->integer('ente_id')->unsigned();
            $table->integer('colaborador_criou_id')->unsigned();
            $table->integer('colaborador_validou_id')->unsigned()->nullable();
            $table->integer('licitacao_id')->unsigned()->nullable();
            $table->enum('tipo_cadastro', ['Manual', 'Automático']);

            $table->string('numero_licitacao')->nullable();
            $table->timestamps();

            $table->foreign('ente_id')->references('id')->on('entes')->onDelete('cascade');
            $table->foreign('licitacao_id')->references('id')->on('licitacoes')->onDelete('cascade');
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
        Schema::drop('contratos');
    }
}
