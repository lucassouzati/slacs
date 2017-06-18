<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateColaboradoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaboradores', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('cidade')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('aprovacao_cadastro')->default(0);
            $table->boolean('ativo')->default(1);
            $table->boolean('isAdmin')->default(0);
            $table->rememberToken();
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
        Schema::drop('colaboradores');
    }
}
