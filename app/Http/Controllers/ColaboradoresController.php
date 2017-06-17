<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Colaborador;
use Illuminate\Http\Request;
use Session;

class ColaboradoresController extends Controller
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
            $colaboradores = Colaborador::where('nome', 'LIKE', "%$keyword%")
				->orWhere('cidade', 'LIKE', "%$keyword%")
				->orWhere('email', 'LIKE', "%$keyword%")
				->orWhere('password', 'LIKE', "%$keyword%")
				->orWhere('aprovacao_cadastro', 'LIKE', "%$keyword%")
				->orWhere('ativo', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $colaboradores = Colaborador::paginate($perPage);
        }

        return view('colaboradores.index', compact('colaboradores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('colaboradores.create');
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
        
        Colaborador::create($requestData);

        \Session::flash('flash_message',[
            'msg'=>"Colaborador cadastrado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect('colaboradores');
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
        $colaboradore = Colaborador::findOrFail($id);

        return view('colaboradores.show', compact('colaboradore'));
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
        $colaboradore = Colaborador::findOrFail($id);

        return view('colaboradores.edit', compact('colaboradore'));
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
        
        $colaboradore = Colaborador::findOrFail($id);
        $colaboradore->update($requestData);

        \Session::flash('flash_message',[
            'msg'=>"Colaborador atualizado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect('colaboradores');
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
        Colaborador::destroy($id);

        \Session::flash('flash_message',[
            'msg'=>"Colaborador excluído com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect('colaboradores');
    }
}
