<?php

use Illuminate\Database\Seeder;

class EntesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entes')->insert([
        	['nome' => 'teste', 'municipio' => 'teste', 'link_transparencia' => 'teste', 'link_licitacoes' => 'teste', 'link_contratos' => 'teste', 'esfera' => 'Municipal', 'classificacao' => 1, 'ativo' => 1,]
        	]);
    }
}
