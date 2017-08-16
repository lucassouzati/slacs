<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Contestacao;
use Illuminate\Http\Request;
use Session;
use App\Contrato;
use App\Licitacao;

class ContestacaoController extends Controller
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
            $contestacao = Contestacao::where('data', 'LIKE', "%$keyword%")
				->orWhere('status', 'LIKE', "%$keyword%")
				->orWhere('observacao', 'LIKE', "%$keyword%")
				->orWhere('resposta', 'LIKE', "%$keyword%")
				->orWhere('licitacao_id', 'LIKE', "%$keyword%")
				->orWhere('contrato_id', 'LIKE', "%$keyword%")
				->orWhere('cidadao_id', 'LIKE', "%$keyword%")
				->orWhere('colaborador_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $contestacao = Contestacao::paginate($perPage);
        }

        return view('contestacao.index', compact('contestacao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($tipo, $id)
    {
        if($tipo == 'contrato')
        {
            $contrato = Contrato::find($id);
            return view('contestacao.create', compact('tipo', 'contrato'));
        }
        elseif ($tipo == 'licitacao')
        {
            $licitacao = licitacao::find($id);
            return view('contestacao.create', compact('tipo', 'licitacao'));
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, $tipo, $id)
    {
        
        $requestData = $request->all();
        
        // Contestacao::create($requestData);
        if($tipo == 'contrato')
        {   
            // dd(\Carbon\Carbon::now()->toDateString());
            Contestacao::create([
                'data' => \Carbon\Carbon::now()->toDateString(),
                'status' => 'Pendente',
                'observacao' => $requestData['observacao'],
                'contrato_id' => $id,
                'cidadao_id' => auth()->guard('cidadao')->user()->id,
                'tipo' => $tipo,
            ]);
            // return view('contestacao.create', compact('tipo', 'contrato'));
        }
        elseif ($tipo == 'licitacao')
        {
            $licitacao = licitacao::find($id);
            Contestacao::create([
                'data' => \Carbon\Carbon::now()->toDateString(),
                'status' => 'Pendente',
                'observacao' => $requestData['observacao'],
                'licitacao_id' => $id,
                'cidadao_id' => auth()->guard('cidadao')->user()->id,
                'tipo' => $tipo,
            ]);
        }

        \Session::flash('flash_message',[
            'msg'=>"Contestacao cadastrada com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('cidadao.home');
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
        $contestacao = Contestacao::findOrFail($id);

        return view('contestacao.show', compact('contestacao'));
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
        $contestacao = Contestacao::findOrFail($id);

        return view('contestacao.edit', compact('contestacao'));
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
        
        $contestacao = Contestacao::findOrFail($id);
        $contestacao->update($requestData);

        \Session::flash('flash_message',[
            'msg'=>"Contestacao atualizado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect('contestacao');
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
        Contestacao::destroy($id);

        \Session::flash('flash_message',[
            'msg'=>"Contestacao excluído com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect('contestacao');
    }

    public function formResposta($id)
    {
        $contestacao = Contestacao::find($id);
        return view('contestacao.formResposta', compact('contestacao'));
    }

    public function postResposta(Request $request, $id)
    {
        $contestacao = Contestacao::find($id);
        $requestData = $request->all();
        $contestacao->update([
            'status' => 'Respondida',
            'resposta' => $requestData['resposta']
            ]);

        \Session::flash('flash_message',[
            'msg'=>"Contestacao respondida com sucesso!",
            'class'=>"alert-success"
        ]);
        return redirect('/home');
    }
}
