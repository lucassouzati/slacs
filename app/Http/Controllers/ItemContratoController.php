<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ItemContrato;
use Illuminate\Http\Request;
use Session;

class ItemContratoController extends Controller
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
            $itemcontrato = ItemContrato::where('item', 'LIKE', "%$keyword%")
				->orWhere('exercicio', 'LIKE', "%$keyword%")
				->orWhere('descricao', 'LIKE', "%$keyword%")
				->orWhere('quantidade', 'LIKE', "%$keyword%")
				->orWhere('unidade_medida', 'LIKE', "%$keyword%")
				->orWhere('valor_unitario', 'LIKE', "%$keyword%")
				->orWhere('valor_total', 'LIKE', "%$keyword%")
				->orWhere('contrato_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $itemcontrato = ItemContrato::paginate($perPage);
        }

        return view('item-contrato.index', compact('itemcontrato'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($contrato_id)
    {
        return view('item-contrato.create', compact('contrato_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store($contrato_id, Request $request)
    {
        
        $requestData = $request->all();

        $ultimo_item = ItemContrato::where('contrato_id', $contrato_id)->get()->last();

        if($ultimo_item != null)
            $requestData = array_add($requestData, 'item', $ultimo_item->item + 1);
        else
            $requestData = array_add($requestData, 'item', 1);

        $requestData = array_add($requestData, 'contrato_id', $contrato_id);
        
        ItemContrato::create($requestData);

        \Session::flash('flash_message',[
            'msg'=>"ItemContrato cadastrado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('contratos.show', $contrato_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($contrato_id, $id)
    {
        $itemcontrato = ItemContrato::findOrFail($id);

        return view('item-contrato.show', compact('itemcontrato', 'contrato_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($contrato_id, $id)
    {
        $itemcontrato = ItemContrato::findOrFail($id);

        return view('item-contrato.edit', compact('itemcontrato', 'contrato_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($contrato_id, $id, Request $request)
    {
        
        $requestData = $request->all();
        
        $itemcontrato = ItemContrato::findOrFail($id);
        $itemcontrato->update($requestData);

        \Session::flash('flash_message',[
            'msg'=>"ItemContrato atualizado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('contratos.show', $contrato_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($contrato_id, $id)
    {
        ItemContrato::destroy($id);

        \Session::flash('flash_message',[
            'msg'=>"ItemContrato excluído com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('contratos.show', $contrato_id);
    }
}
