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
        $requestData = $request->all();

        if(empty($requestData))
        {
            $licitacoes = Licitacao::all();    
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

}
