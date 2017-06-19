<?php

use Illuminate\Database\Seeder;
//use App\Colaborador;

class ColaboradoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colaboradores')->insert([
        	['nome' => 'Lucas de Souza Siqueira',
        	'cidade' => 'Itaperuna',
        	'email' => 'lucassouza.ti@gmail.com',
        	'password'=> bcrypt('1234'),
        	'aprovacao_cadastro' => 'Aprovado',
        	'ativo' => 1,
        	'isAdmin' => 1]
        ]);
    }
}
