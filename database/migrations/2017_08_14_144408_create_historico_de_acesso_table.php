<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricoDeAcessoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico_de_acesso', function(Blueprint $table) {
            $table->increments('id');
            $table->boolean('licitacoes');
            $table->boolean('contratos');
            $table->boolean('transparencia');
            $table->datetime('data_hora');
            $table->integer('ente_id')->unsigned();
            $table->timestamps();

            $table->foreign('ente_id')->references('id')->on('entes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('historico_de_acesso');
    }
}
