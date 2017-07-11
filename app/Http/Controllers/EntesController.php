<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Ente;
use Illuminate\Http\Request;
use Session;

class EntesController extends Controller
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
            $entes = Ente::where('nome', 'LIKE', "%$keyword%")
				->orWhere('municipio', 'LIKE', "%$keyword%")
				->orWhere('link_transparencia', 'LIKE', "%$keyword%")
				->orWhere('link_licitacoes', 'LIKE', "%$keyword%")
				->orWhere('link_contratos', 'LIKE', "%$keyword%")
				->orWhere('esfera', 'LIKE', "%$keyword%")
				->orWhere('classificacao', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $entes = Ente::paginate($perPage);
        }

        return view('entes.index', compact('entes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('entes.create');
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
        
        Ente::create($requestData);

        \Session::flash('flash_message',[
            'msg'=>"Ente cadastrado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect('entes');
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
        $ente = Ente::findOrFail($id);

        return view('entes.show', compact('ente'));
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
        $ente = Ente::findOrFail($id);

        return view('entes.edit', compact('ente'));
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
        
        $ente = Ente::findOrFail($id);
        $ente->update($requestData);

        \Session::flash('flash_message',[
            'msg'=>"Ente atualizado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect('entes');
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
        Ente::destroy($id);

        \Session::flash('flash_message',[
            'msg'=>"Ente excluído com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect('entes');
    }
}
