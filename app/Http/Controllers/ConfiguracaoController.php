<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuracao;

class ConfiguracaoController extends Controller
{
    public function edit()
    {
    	$configuracao = Configuracao::find(1);
    	return view('colaboradores.configuracao', compact('configuracao'));
    }

    public function update(Request $request)
    {
    	Configuracao::find(1)->update($request->all());
    	\Session::flash('flash_message',[
            'msg'=>"Configurações atualizadas com sucesso!",
            'class'=>"alert-success"
            ]);
    	return redirect('/home');
    }


}
