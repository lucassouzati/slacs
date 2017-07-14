<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_contratos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('item');
            $table->string('exercicio')->nullable();
            $table->string('descricao')->nullable();
            $table->integer('quantidade');
            $table->string('unidade_medida')->nullable();
            $table->double('valor_unitario');
            $table->double('valor_total');
            $table->integer('contrato_id')->unsigned();
            $table->timestamps();

            $table->foreign('contrato_id')->references('id')->on('contratos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('item_contratos');
    }
}
