<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cidadao;
use App\Licitacao;
use App\Contrato;
use Illuminate\Http\Request;
use Session;

class CidadaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $cidadao = Cidadao::where('nome', 'LIKE', "%$keyword%")
				->orWhere('email', 'LIKE', "%$keyword%")
				->orWhere('password', 'LIKE', "%$keyword%")
				->orWhere('cidade', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $cidadao = Cidadao::paginate($perPage);
        }

        return view('cidadao.index', compact('cidadao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('cidadao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Cidadao::create($requestData);

        \Session::flash('flash_message',[
            'msg'=>"Cidadao cadastrado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect('cidadao');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $cidadao = Cidadao::findOrFail($id);

        return view('cidadao.show', compact('cidadao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $cidadao = Cidadao::findOrFail($id);

        return view('cidadao.edit', compact('cidadao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $cidadao = Cidadao::findOrFail($id);
        $cidadao->update($requestData);

        \Session::flash('flash_message',[
            'msg'=>"Cidadao atualizado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect('cidadao');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Cidadao::destroy($id);

        \Session::flash('flash_message',[
            'msg'=>"Cidadao excluído com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect('cidadao');
    }

    public function consultaLicitacoes(Request $request = null)
    {
        $filtros = $request->all();

        if(empty($filtros))
        {
            $licitacoes = Licitacao::paginate(40);    
        }
        else
        {
            $licitacoes = Licitacao::when($filtros['ente_id'], function ($query) use ($filtros) {
                    return $query->where('ente_id', $filtros['ente_id']);
                })
            ->when($filtros['modalidade'], function($query) use ($filtros){
                return  $query->where('modalidade', 'LIKE', "%".$filtros['modalidade']."%");
            })
            ->when($filtros['situacao'], function($query) use ($filtros){
                return  $query->where('situacao', 'LIKE', "%".$filtros['situacao']."%");
            })
            ->when($filtros['criterio'], function($query) use ($filtros){
                return  $query->where('criterio', 'LIKE', "%".$filtros['criterio']."%");
            })
            ->when($filtros['objeto'], function($query) use ($filtros){
                return  $query->where('objeto', 'LIKE', "%".$filtros['objeto']."%");
            })
            ->when(($filtros['valor_minimo'] != '' || $filtros['valor_maximo'] != ''), function ($query) use ($filtros) {
                    if($filtros['valor_maximo'] == '' && $filtros['valor_minimo'] != '')
                    {
                        return $query->where('valor', '>', $filtros['valor_minimo']);    
                    }
                    else if($filtros['valor_maximo'] != '' && $filtros['valor_minimo'] == '')
                    {
                        return $query->where('valor', '<', $filtros['valor_maximo']);    
                    }
                    else{
                        return $query->where('valor', '>', $filtros['valor_minimo'])
                        ->where('valor', '<', $filtros['valor_maximo']);
                    }
                })
            ->when($filtros['cnpj_cpf'], function($query) use ($filtros){
                return $query->join('item_licitacaos', function($join) use ($filtros){
                    $join->on('licitacoes.id', '=', 'item_licitacaos.licitacao_id')
                    ->where('cnpj_cpf', 'LIKE', '%'.$filtros['cnpj_cpf'].'%');
                });
            })
            ->when($filtros['descricao_itens'], function($query) use ($filtros){
                return $query->join('item_licitacaos', function($join) use ($filtros){
                    $join->on('licitacoes.id', '=', 'item_licitacaos.licitacao_id')
                    ->where('descricao', 'LIKE', '%'.$filtros['descricao_itens'].'%');
                });
            })
            ->paginate(40);
        }
        return view('modulo-cidadao.licitacao', compact('licitacoes'));
    }
    
    public function consultaContratos(Request $request = null)
    {
        $requestData = $request->all();

        if(empty($requestData))
        {
            $contratos = Licitacao::all();    
        }
        return view('modulo-cidadao.contrato', compact('contratos'));
    }

    public function mostraLicitacao($id)
    {
        $licitacao = Licitacao::find($id);

        return view('modulo-cidadao.mostra_licitacao', compact('licitacao'));
    }

}
