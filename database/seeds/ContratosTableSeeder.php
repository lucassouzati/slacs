<?php

use Illuminate\Database\Seeder;

class ContratosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // protected $fillable = ['unidade_gestora', 'data_emissao', 'instrumento_contrato', 'numero_contrato', 'data_expiracao', 'tipo', 'fornecedor', 'cnpj_cpf', 'teve_aditivo', 'processo', 'valor', 'descricao', 'ente_id', 'colaborador_criou_id', 'colaborador_validou_id', 'licitacao_id', 'numero_licitacao'];

        DB::table('contratos')->insert([      


        ]);
    }
}
