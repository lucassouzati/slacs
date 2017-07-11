<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEntesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('municipio');
            $table->string('link_transparencia');
            $table->string('link_licitacoes');
            $table->string('link_contratos')->nullable();
            $table->string('esfera');
            $table->integer('classificacao')->unsigned();
            $table->boolean('ativo')->default(1);
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
        Schema::drop('entes');
    }
}
