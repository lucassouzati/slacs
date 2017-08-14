<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HistoricoDeAcesso;
use GuzzleHttp\Client;

class HistoricoDeAcessoController extends Controller
{
    public function index(Request $request = null)
    {
    	$filtros = $request->all();

    	if(empty($filtros))
    	{
    		$historicos_de_acesso = HistoricoDeAcesso::paginate(50);
    	}
    	else
    	{

    	}

    	return view('entes.historicos_de_acesso.index', compact('historicos_de_acesso'));
    }

    public function importar()
    {
    	try{
            $client = new Client();
            $result = $client->request('GET', 'http://192.168.0.105:8001/historicos_de_acesso');
        }
        catch (Exception $e){

            return redirect()->back()->withErrors(['errors' => 'Ocorreu algum erro ao importar os dados.']);
        }

        $historicos_de_acesso = json_decode($result->getBody());
        // dd($historicos_de_acesso);
        foreach ($historicos_de_acesso as $historico_de_acesso)
        {
        	HistoricoDeAcesso::updateOrCreate([
        		'id' => $historico_de_acesso->id,
        		'licitacoes' => $historico_de_acesso->licitacoes,
        		'contratos' => $historico_de_acesso->contratos,
        		'transparencia' => $historico_de_acesso->portal_transparencia,
        		'data_hora' => $historico_de_acesso->data_hora,
        		'ente_id' => $historico_de_acesso->ente_id,
			]);
        }

        \Session::flash('flash_message',[
            'msg'=>"Dados importados com sucesso!",
            'class'=>"alert-success"
            ]);
        
        return redirect()->back();
    }

}
