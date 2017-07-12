<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ItemLicitacao;
use Illuminate\Http\Request;
use Session;

class ItemLicitacaoController extends Controller
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
            $itemlicitacao = ItemLicitacao::where('item', 'LIKE', "%$keyword%")
				->orWhere('descricao', 'LIKE', "%$keyword%")
				->orWhere('quantidade', 'LIKE', "%$keyword%")
				->orWhere('unidade_medida', 'LIKE', "%$keyword%")
				->orWhere('valor_unitario', 'LIKE', "%$keyword%")
				->orWhere('valor_proposta_vencedora', 'LIKE', "%$keyword%")
				->orWhere('valor_total', 'LIKE', "%$keyword%")
				->orWhere('licitacao_id', 'LIKE', "%$keyword%")
				->orWhere('tipo_pessoa_fisica', 'LIKE', "%$keyword%")
				->orWhere('cnpj_cpf_vencedor', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $itemlicitacao = ItemLicitacao::paginate($perPage);
        }

        return view('item-licitacao.index', compact('itemlicitacao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($licitacao_id)
    {
        return view('item-licitacao.create', compact('licitacao_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, $licitacao_id)
    {

        
        $requestData = $request->all();
        $ultimo_item = ItemLicitacao::where('licitacao_id', $licitacao_id)->get()->last();

        if($ultimo_item != null)
            $requestData = array_add($requestData, 'item', $ultimo_item->item + 1);
        else
            $requestData = array_add($requestData, 'item', 1);

        $requestData = array_add($requestData, 'licitacao_id', $licitacao_id);
        //dd($requestData);

        ItemLicitacao::create($requestData);

        \Session::flash('flash_message',[
            'msg'=>"Item da Licitacao cadastrado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('licitacoes.show', $licitacao_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($licitacao_id, $id)
    {
        $itemlicitacao = ItemLicitacao::findOrFail($id);

        return view('item-licitacao.show', compact('itemlicitacao', 'licitacao_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($licitacao_id, $id)
    {
        $itemlicitacao = ItemLicitacao::findOrFail($id);
        //dd($itemlicitacao);

        return view('item-licitacao.edit', compact('itemlicitacao', 'licitacao_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($licitacao_id, $id, Request $request)
    {
        
        $requestData = $request->all();
        
        $itemlicitacao = ItemLicitacao::findOrFail($id);
        $itemlicitacao->update($requestData);

        \Session::flash('flash_message',[
            'msg'=>"ItemLicitacao atualizado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('licitacoes.show', $licitacao_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($licitacao_id, $id)
    {
        ItemLicitacao::destroy($id);

        \Session::flash('flash_message',[
            'msg'=>"Item da Licitacao excluído com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('licitacoes.show',$licitacao_id);
    }
}
