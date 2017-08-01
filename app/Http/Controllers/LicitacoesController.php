<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Licitacao;
use App\Ente;
use Illuminate\Http\Request;
use Session;
use \XmlParser;

class LicitacoesController extends Controller
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
            $licitacoes = Licitacao::where('unidade_gestora', 'LIKE', "%$keyword%")
				->orWhere('num_proc', 'LIKE', "%$keyword%")
				->orWhere('modalidade', 'LIKE', "%$keyword%")
				->orWhere('tipo', 'LIKE', "%$keyword%")
				->orWhere('situacao', 'LIKE', "%$keyword%")
				->orWhere('data_julgamento', 'LIKE', "%$keyword%")
				->orWhere('data_homologacao', 'LIKE', "%$keyword%")
				->orWhere('objeto', 'LIKE', "%$keyword%")
				->orWhere('valor', 'LIKE', "%$keyword%")
				->orWhere('criterio', 'LIKE', "%$keyword%")
				->orWhere('prazo_execucao', 'LIKE', "%$keyword%")
				->orWhere('ente_id', 'LIKE', "%$keyword%")
				->orWhere('tipo_cadastro', 'LIKE', "%$keyword%")
				->orWhere('situacao', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $licitacoes = Licitacao::paginate($perPage);
        }

        return view('licitacoes.index', compact('licitacoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $entes = Ente::all();
        // dd($entes);
        return view('licitacoes.create', compact('entes'));
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
        //dd($request->all());
        $this->validate($request, [
            'unidade_gestora' => 'required', 
            'num_proc' => 'required', 
            'modalidade' => 'required', 
            'tipo' => 'required', 
            'data_julgamento' => 'date_format:d/m/Y', 
            'data_homologacao' => 'date_format:d/m/Y', 
            //'objeto' => '',
            'prazo_execucao' => 'required', 
            'ente_id' => 'required', 
        ]);
        
        $requestData = $request->all();
        $requestData = array_add($requestData, "colaborador_criou_id", auth()->user()->id);
        
        Licitacao::create($requestData);

        \Session::flash('flash_message',[
            'msg'=>"Licitacao cadastrado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect('licitacoes');
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
        $licitaco = Licitacao::findOrFail($id);

        return view('licitacoes.show', compact('licitaco'));
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
        $licitaco = Licitacao::findOrFail($id);
        $entes = Ente::all();

        return view('licitacoes.edit', compact('licitaco', 'entes'));
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
        
        $licitaco = Licitacao::findOrFail($id);
        $licitaco->update($requestData);

        \Session::flash('flash_message',[
            'msg'=>"Licitacao atualizado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect('licitacoes');
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
        Licitacao::destroy($id);

        \Session::flash('flash_message',[
            'msg'=>"Licitacao excluído com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect('licitacoes');
    }
}
