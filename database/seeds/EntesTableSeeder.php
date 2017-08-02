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
            ['nome' => 'Prefeitura Municipal de Aperibé', 'municipio' => 'Aperibé', 'link_transparencia' => 'teste', 'link_licitacoes' => 'teste', 'link_contratos' => 'teste', 'esfera' => 'Municipal', 'classificacao' => 1, 'ativo' => 1,],
            ['nome' => 'Prefeitura Municipal de Bom Jesus do Itabapoana', 'municipio' => 'Bom Jesus do Itabapoana', 'link_transparencia' => 'teste', 'link_licitacoes' => 'teste', 'link_contratos' => 'teste', 'esfera' => 'Municipal', 'classificacao' => 1, 'ativo' => 1,],
            ['nome' => 'Prefeitura Municipal de Cambuci', 'municipio' => 'Cambuci', 'link_transparencia' => 'teste', 'link_licitacoes' => 'teste', 'link_contratos' => 'teste', 'esfera' => 'Municipal', 'classificacao' => 1, 'ativo' => 1,],
            ['nome' => 'Prefeitura Municipal de Laje do Muriaé', 'municipio' => 'Laje do Muriaé', 'link_transparencia' => 'teste', 'link_licitacoes' => 'teste', 'link_contratos' => 'teste', 'esfera' => 'Municipal', 'classificacao' => 1, 'ativo' => 1,],
            ['nome' => 'Prefeitura Municipal de Italva', 'municipio' => 'Italva', 'link_transparencia' => 'teste', 'link_licitacoes' => 'teste', 'link_contratos' => 'teste', 'esfera' => 'Municipal', 'classificacao' => 1, 'ativo' => 1,],
            ['nome' => 'Prefeitura Municipal de Itaperuna', 'municipio' => 'Itaperuna', 'link_transparencia' => 'teste', 'link_licitacoes' => 'teste', 'link_contratos' => 'teste', 'esfera' => 'Municipal', 'classificacao' => 1, 'ativo' => 1,],
            ['nome' => 'Prefeitura Municipal de Itaocara', 'municipio' => 'Itaocara', 'link_transparencia' => 'teste', 'link_licitacoes' => 'teste', 'link_contratos' => 'teste', 'esfera' => 'Municipal', 'classificacao' => 1, 'ativo' => 1,],
            ['nome' => 'Prefeitura Municipal de Miracema', 'municipio' => 'Miracema', 'link_transparencia' => 'teste', 'link_licitacoes' => 'teste', 'link_contratos' => 'teste', 'esfera' => 'Municipal', 'classificacao' => 1, 'ativo' => 1,],
            ['nome' => 'Prefeitura Municipal de Natividade', 'municipio' => 'Natividade', 'link_transparencia' => 'teste', 'link_licitacoes' => 'teste', 'link_contratos' => 'teste', 'esfera' => 'Municipal', 'classificacao' => 1, 'ativo' => 1,],
            ['nome' => 'Prefeitura Municipal de Porciúncula', 'municipio' => 'Porciúncula', 'link_transparencia' => 'teste', 'link_licitacoes' => 'teste', 'link_contratos' => 'teste', 'esfera' => 'Municipal', 'classificacao' => 1, 'ativo' => 1,],
            ['nome' => 'Prefeitura Municipal de Santo Antônio de Pádua', 'municipio' => 'Santo Antônio de Pádua', 'link_transparencia' => 'teste', 'link_licitacoes' => 'teste', 'link_contratos' => 'teste', 'esfera' => 'Municipal', 'classificacao' => 1, 'ativo' => 1,],
            ['nome' => 'Prefeitura Municipal de São José de Ubá', 'municipio' => 'São José de Ubá', 'link_transparencia' => 'teste', 'link_licitacoes' => 'teste', 'link_contratos' => 'teste', 'esfera' => 'Municipal', 'classificacao' => 1, 'ativo' => 1,],
        	['nome' => 'Prefeitura Municipal de Varre-Sai', 'municipio' => 'Varre-Sai', 'link_transparencia' => 'teste', 'link_licitacoes' => 'teste', 'link_contratos' => 'teste', 'esfera' => 'Municipal', 'classificacao' => 1, 'ativo' => 1,],
        	]);
    }
}
