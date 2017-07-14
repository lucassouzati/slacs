<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemLicitacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_licitacaos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('item');
            $table->string('descricao');
            $table->integer('quantidade');
            $table->string('unidade_medida');
            $table->double('valor_unitario');
            $table->double('valor_proposta_vencedora');
            $table->double('valor_total')->nullable();
            $table->integer('licitacao_id')->unsigned();
            $table->string('tipo_pessoa');
            $table->string('cnpj_vencedor')->nullable();
            $table->string('cpf_vencedor')->nullable();
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
        Schema::drop('item_licitacaos');
    }
}
