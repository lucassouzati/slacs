<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Contrato;
use App\Ente;
use App\Licitacao;
use Illuminate\Http\Request;
use Session;

class ContratosController extends Controller
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
            $contratos = Contrato::where('unidade_gestora', 'LIKE', "%$keyword%")
				->orWhere('data_emissao', 'LIKE', "%$keyword%")
				->orWhere('instrumento_contrato', 'LIKE', "%$keyword%")
				->orWhere('numero_contrato', 'LIKE', "%$keyword%")
				->orWhere('data_expiracao', 'LIKE', "%$keyword%")
				->orWhere('tipo', 'LIKE', "%$keyword%")
				->orWhere('fornecedor', 'LIKE', "%$keyword%")
				->orWhere('cnpj_cpf', 'LIKE', "%$keyword%")
				->orWhere('teve_aditivo', 'LIKE', "%$keyword%")
				->orWhere('processo', 'LIKE', "%$keyword%")
				->orWhere('valor', 'LIKE', "%$keyword%")
				->orWhere('descricao', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $contratos = Contrato::paginate($perPage);
        }

        return view('contratos.index', compact('contratos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $entes = Ente::all();
        $licitacoes = Licitacao::all();
        return view('contratos.create', compact('entes', 'licitacoes'));
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
        $this->validate($request, [
            'processo' => 'required', 
            'cnpj_cpf' => 'required', 
            'data_emissao' => 'date_format:d/m/Y', 
            'data_expiracao' => 'date_format:d/m/Y', 
            //'objeto' => '',
            'ente_id' => 'required', 
            ]);
        
        $requestData = $request->all();
        //dd($requestData);
        $requestData = array_add($requestData, "colaborador_criou_id", auth()->user()->id);
        $requestData = array_add($requestData, "tipo_cadastro", "Manual");
        
        
        Contrato::create($requestData);

        \Session::flash('flash_message',[
            'msg'=>"Contrato cadastrado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect('contratos');
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
        $contrato = Contrato::findOrFail($id);

        return view('contratos.show', compact('contrato'));
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
        $contrato = Contrato::findOrFail($id);
        $entes = Ente::all();
        $licitacoes = Licitacao::all();

        return view('contratos.edit', compact('contrato', 'entes', 'licitacoes'));
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
        
        $contrato = Contrato::findOrFail($id);
        $contrato->update($requestData);

        \Session::flash('flash_message',[
            'msg'=>"Contrato atualizado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect('contratos');
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
        Contrato::destroy($id);

        \Session::flash('flash_message',[
            'msg'=>"Contrato excluído com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect('contratos');
    }
}
